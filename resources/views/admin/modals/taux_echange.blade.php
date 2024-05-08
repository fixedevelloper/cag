
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modify taux  {!! $crypto->name !!}</h5>
                <a class="btn-close"
                   data-dismiss="modal"
                   aria-label="Close" rel="modal:close"></a>
            </div>
            <div class="modal-body">
                <div class="auth-form">

                    <form  class="identity-upload" method="POST" action="{!! route("admin.bc_taux_modal",['id'=>$crypto->id]) !!}">
                        @csrf
                        <div class="identity-content">
                            <div class="col-12">
                                <label class="form-label">Taux Buy</label>
                                <div class="input-group">
                                    <span class="input-group-text">FCFA</span>
                                    <input
                                        id="currency_sell"
                                        type="text"
                                        name="taux_buy"
                                        class="form-control"
                                        value="{!! $crypto->taux !!}"
                                    />
                                </div>

                            </div>
                            <div class="col-12">
                                <label class="form-label">Taux sell</label>
                                <div class="input-group">
                                    <span class="input-group-text">FCFA</span>
                                    <input
                                        id="currency_sell"
                                        type="text"
                                        name="taux_sell"
                                        class="form-control"
                                        value="{!! $crypto->taux_sell !!}"
                                    />
                                </div>

                            </div>
                            <div class="text-center mt-4">
                                @if(isset($crypto->status))  <button type="submit" class="btn btn-primary btn-block" >Confirm</button> @else  <button type="button" class="btn btn-primary btn-block" disabled>Please activate crypto</button> @endif

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
