<div class="modal fade" id="modalDelete{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" style="color: #000138;">
        <div class="modal-header" >
          <h5 class="modal-title" id="exampleModalLongTitle">Conferma eliminazione prodotto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            Vuoi davvero eliminare il prodotto {{$product->name}} dal ristorante?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Torna indietro</button>
          <form action="{{route('product.destroy', compact('product'))}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Conferma</button>
        </form>
        </div>
      </div>
    </div>
</div>
