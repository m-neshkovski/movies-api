@extends('layouts.app')

@section('content')
<div id="welcome" class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center py-3">
            <h1>Search movies by title and/or category</h1>
        </div>
        <div class="col-md-8">
            <form id="filter">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input class="form-control" type="text" id="search_title" name="search_title" placeholder="Search title">
                    </div>
                    <div class="form-group col-md-6">
                        <select class="form-control custom-select" id="category" name="category">
                            <option value="" selected>All categories</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-12 pt-5">
            <div id="movie-cards" class="row">
                {{-- print cards here --}}
            </div>
        </div>
    </div>
</div> 
  <!-- Modal -->
  <div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title h1" id="detailsModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div id="model-body" class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <img id="modal-img" class="img-fluid" src="" alt="Movie img">
                </div>
                <div id="modal-details" class="col-md-6">
                    {{-- details --}}
                    
                </div>
                <div class="col-md-12 pt-3">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas cum neque consequuntur harum laudantium ut autem cumque vitae ea exercitationem, quidem nostrum dolorem, dignissimos qui quibusdam accusamus sunt. Doloribus, officiis! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error vitae deleniti, officiis consequatur totam mollitia iusto, ducimus veritatis vero architecto expedita minima possimus soluta eum repellat sint dolore fugit odit?</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas cum neque consequuntur harum laudantium ut autem cumque vitae ea exercitationem, quidem nostrum dolorem, dignissimos qui quibusdam accusamus sunt. Doloribus, officiis! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error vitae deleniti, officiis consequatur totam mollitia iusto, ducimus veritatis vero architecto expedita minima possimus soluta eum repellat sint dolore fugit odit?</p>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@endsection