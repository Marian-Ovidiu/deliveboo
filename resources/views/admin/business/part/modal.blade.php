<!-- Modal -->
<div class="modal fade" id="delete{{$product->id}}" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        Vupoi davvero cancellare questo prodotto?
      </div>
      <div class="modal-footer">
        <form method="post" action="{{route('product.destroy', compact('product'))}}">
          @csrf
          @method('DELETE')
          <input type="submit" class="btn btn-primary" name="Yes" value="Yes">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
      </form>
      </div>
    </div>
  </div>
</div>
