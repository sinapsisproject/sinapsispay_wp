
{if $perfil_user == false}

{if $display_price == 'si'}
<div class="col-12 d-inline-flex mb-5">
    <div class="row">
        <div class="col-12 col-md-5">
        <button onclick="create_transaction({$id_curso})" type="button">
            <div style="width: 1rem; height: 1rem; margin-right: 6px; display: none;" class="spinner-border loading_create_transaction_user_1" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            {$text_button}
            <i style="margin-left: 10px;" class="fa-solid fa-arrow-right"></i>
        </button>
        </div>
        <div class="col-12 col-md-7">
            <h3 class="title-price">$ {$curso->precio|number_format:0:',':'.'}.-</h3>
        </div>
    </div>
</div>

{/if}
{if $display_price == 'no'}
<button onclick="create_transaction({$id_curso})" type="button">
    <div style="width: 1rem; height: 1rem; margin-right: 6px; display: none;" class="spinner-border loading_create_transaction_user_1" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
    {$text_button}
    <i style="margin-left: 10px;" class="fa-solid fa-arrow-right"></i>
</button>
{/if}

<div class="modal fade" id="modalpay" data-bs-backdrop="static" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      
      <div class="modal-body modal-pay">

        <div class="row">
            <div class="col-12 text-end">
                <a class="btn-close-auth" data-bs-dismiss="modal" aria-label="Close"><i style="color: #aaa;" class="fa-solid fa-xmark"></i></a>
            </div>
        </div>

        <div class="row">

            <div class="col-12 col-md-5 img-curso-pay text-end">
                <img style="width: 80%;" src="{$curso->imagen}" alt="">
            </div>
            <div class="col-12 col-md-7 description-pay">
                <h3 style="color: white;">{$curso->nombre}</h3>
                <p>{$curso->descripcion_corta}</p>

            <div class="col-12">
                <div class="row">
                    <div class="col-6 doctor-pay">
                        <p>{$instructor->nombre}</p>
                    </div>
                    <div class="col-6 text-end price-pay">
                        <h3 style="color: white;">$ {$curso->precio|number_format:0:',':'.'}</h3>
                    </div>
                </div>
            </div>

            <div class="row box-total-pay">

                <div class="col-6 text-start subtotal-pay">
                    <p>Subtotal</p>
                </div>
                <div class="col-6 text-end subtotal-price">
                    <p>${$curso->precio|number_format:0:',':'.'}</p>
                </div>
                <hr class="mb-2">
                <div class="col-6 text-start total-pay">
                    <p>Total</p>
                </div>
                <div class="col-6 text-end total-price">
                    <p>${$curso->precio|number_format:0:',':'.'}</p>
                </div>

            </div>



        </div>


        

        <div class="row">
            <div class="col-12 text-center mb-5">
                <div id="divbuttonpay"></div>
            </div>
        </div>

        </div>

      </div>
      
    </div>
  </div>
</div>

{/if}