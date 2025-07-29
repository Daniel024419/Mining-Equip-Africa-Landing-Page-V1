<!-- Search Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark border-warning">
            <div class="modal-header border-warning">
                <h5 class="modal-title text-warning">Search Mining Equipment</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="searchForm" class="d-flex">
                    <input type="search" id="searchInput" class="form-control bg-transparent text-white border-warning" 
                           placeholder="Search equipment or services..." required>
                    <button type="submit" class="btn btn-warning ms-2">
                        <i class="fas fa-search text-dark"></i>
                    </button>
                </form>
                <div class="mt-3">
                    <p class="text-warning mb-1">Popular Searches:</p>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="#" class="badge bg-warning text-dark popular-search">RC Drills</a>
                        <a href="#" class="badge bg-warning text-dark popular-search">Excavators</a>
                        <a href="#" class="badge bg-warning text-dark popular-search">Diamond Core</a>
                        <a href="#" class="badge bg-warning text-dark popular-search">Training</a>
                    </div>
                </div>
                
                <!-- Search Results Container -->
                <div id="searchResults" class="mt-3 d-none">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="text-warning mb-0">Search Results</h6>
                        <small class="text-muted" id="resultsCount">0 results</small>
                    </div>
                    <div class="list-group scrollable-results" style="max-height: 300px; overflow-y: auto;">
                        <!-- Results will be inserted here by JavaScript -->
                    </div>
                </div>
                
                <!-- Loading State -->
                <div id="searchLoading" class="text-center mt-3 d-none">
                    <div class="spinner-border text-warning" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="text-warning mt-2">Searching...</p>
                </div>
                
                <!-- Error State -->
                <div id="searchError" class="alert alert-danger mt-3 d-none" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <span id="errorMessage">Failed to load search results. Please try again.</span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchForm = document.getElementById('searchForm');
    const searchInput = document.getElementById('searchInput');
    const searchResults = document.getElementById('searchResults');
    const resultsContainer = searchResults.querySelector('.list-group');
    const resultsCount = document.getElementById('resultsCount');
    const searchLoading = document.getElementById('searchLoading');
    const searchError = document.getElementById('searchError');
    const popularSearches = document.querySelectorAll('.popular-search');
    
    // API endpoint - matches our Laravel route
    const SEARCH_API_URL = "{{route('api.search')}}";
    
    // Handle form submission
    searchForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const query = searchInput.value.trim();
        
        if (query) {
            performSearch(query);
        }
    });
    
    // Handle popular search clicks
    popularSearches.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            searchInput.value = this.textContent;
            performSearch(this.textContent);
        });
    });
    
    // Perform the search
    function performSearch(query) {
        // Show loading state
        searchResults.classList.add('d-none');
        searchError.classList.add('d-none');
        searchLoading.classList.remove('d-none');
        
        // Prepare request data matching our Laravel controller
        const requestData = {
            query: query,
            filters: {
                // You can add default filters here if needed
                // category: 'mining_equipment'
            }
        };
        
        // Make API request with CSRF token
        fetch(SEARCH_API_URL, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify(requestData)
        })
        .then(response => {
            if (!response.ok) {
                return response.json().then(err => { throw err; });
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                displayResults(data.results);
            } else {
                throw new Error(data.message);
            }
        })
        .catch(error => {
            console.error('Search error:', error);
            showError(error.message || 'Failed to load search results');
        });
    }
    
    // Display results - matches our Equipment model structure
    function displayResults(results) {
        // Hide loading state
        searchLoading.classList.add('d-none');
        
        // Clear previous results
        resultsContainer.innerHTML = '';
        
        if (results && results.length > 0) {
            // Update results count
            resultsCount.textContent = `${results.length} ${results.length === 1 ? 'result' : 'results'}`;
            
            // Add each result to the list
            results.forEach(result => {
                const resultElement = document.createElement('a');
                resultElement.href = `/equipment/show/${result.id}`; // Match your Laravel route
                resultElement.className = 'list-group-item list-group-item-action bg-dark text-white border-warning';
                resultElement.innerHTML = `
                    <div class="d-flex w-100 justify-content-between">
                        <h6 class="mb-1 text-warning">${result.name}</h6>
                        <small class="text-muted">${result.category}</small>
                    </div>
                    <p class="mb-1">${result.description || 'No description available'}</p>
                    <div class="d-flex justify-content-between">
                        <small class="text-muted">${result.condition} • ${result.year || 'N/A'}</small>
                        <small class="text-warning">GHS${result.price ? result.price.toLocaleString() : 'Price on request'}</small>
                    </div>
                `;
                resultsContainer.appendChild(resultElement);
            });
            
            // Show results
            searchResults.classList.remove('d-none');
        } else {
            showError('No results found. Try different keywords.');
        }
    }
    
    // Show error state
    function showError(message) {
        searchLoading.classList.add('d-none');
        searchResults.classList.add('d-none');
        
        document.getElementById('errorMessage').textContent = message;
        searchError.classList.remove('d-none');
    }
});
</script>

<style>
.scrollable-results::-webkit-scrollbar {
    width: 8px;
}

.scrollable-results::-webkit-scrollbar-track {
    background: #343a40;
    border-radius: 10px;
}

.scrollable-results::-webkit-scrollbar-thumb {
    background: #ffc107;
    border-radius: 10px;
}

.scrollable-results::-webkit-scrollbar-thumb:hover {
    background: #e0a800;
}

.list-group-item {
    transition: all 0.2s;
}

.list-group-item:hover {
    background-color: rgba(255, 193, 7, 0.1) !important;
    border-color: #ffc107 !important;
}
</style>