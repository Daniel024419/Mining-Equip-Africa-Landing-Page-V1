 <!-- Delete Confirmation Modal -->
 <div class="modal fade" id="deleteProjectModal{{ $project->id }}" tabindex="-1" role="dialog"
     aria-labelledby="deleteProjectModalLabel{{ $project->id }}" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content" style="background-color: #1a1a1a; color: #f5c518;">
             <div class="modal-header border-0">
                 <h5 class="modal-title" id="deleteProjectModalLabel{{ $project->id }}">
                     Confirm Project Deletion
                 </h5>
                 <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>

             <div class="modal-body">
                 Are you sure you want to delete the project titled
                 "<strong>{{ $project->title }}</strong>"?
                 This action cannot be undone.
             </div>

             <div class="modal-footer border-0">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                 <form action="{{ route('dashboard.projects.destroy', $project->id) }}" method="POST" class="d-inline">
                     @csrf
                     @method('DELETE')
                     <button type="submit" class="btn btn-danger">
                         <i class="fas fa-trash-alt"></i> Delete
                     </button>
                 </form>
             </div>
         </div>
     </div>
 </div>
