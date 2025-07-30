 <!-- Delete Modal -->
 <div class="modal fade" id="deleteEquipmentModal-{{ $equipment->id }}" tabindex="-1"
     aria-labelledby="deleteEquipmentModalLabel-{{ $equipment->id }}" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content bg-dark text-light border border-warning">
             <div class="modal-header border-0">
                 <h5 class="modal-title" id="deleteEquipmentModalLabel-{{ $equipment->id }}">
                     Confirm Deletion
                 </h5>
                 <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                     aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 Are you sure you want to delete <strong>{{ $equipment->name }}</strong>?
             </div>
             <div class="modal-footer border-0">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                 <form action="{{ route('dashboard.equipments.destroy', $equipment) }}" method="POST" class="d-inline">
                     @csrf
                     @method('DELETE')
                     <button type="submit" class="btn btn-danger">Delete</button>
                 </form>
             </div>
         </div>
     </div>
 </div>
