<div class="row">
    <div class="col-12 text-center title-pay-ok">
        <i class="fa-solid fa-circle-check"></i>
        <h1>¡Pago Exitoso!</h1>
    </div>

    <div class="row mt-3 mb-4 shadow box-detail-pay">
        <div class="col-6">
            <div class="row">
                <div class="col-12 mb-4">
                    <p style="font-size: 30px; font-weight: bold; margin-bottom: 2px;">Nº de orden: {$order}</p>
                    <p><i style="margin-right: 10px;" class="fa-solid fa-calendar-days"></i> {$fecha|date_format:"%d-%m-%Y"}</p>
                </div>

                <div class="col-5">
                    <p>Item:</p>
                </div>
                <div class="col-7">
                    <p>{$curso->nombre}.</p>
                </div>
                <hr>
                <div class="col-5 mt-3">
                    <p>Total:</p>
                </div>
                <div class="col-7 mt-3">
                    <p>$ {$curso->precio|number_format:0:',':'.'}.-</p>
                </div>
                <div class="col-12 text-center mt-5">
                    <p style="font-size: 13px;">Se ha enviado automáticamente un comprobante de pago a tu correo electrónico {$usuario->email}</p>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="row justify-content-end">
                <div class="card" style="width: 18rem;">
                    <img src="{$curso->imagen}" class="card-img-top" alt="...">
                    <div class="card-body align-self-center">
                        <a href="/cursos-sinapsis/?curso={$curso->id}"><button type="button">Ir al curso <i style="margin-left: 10px;" class="fa-solid fa-arrow-right"></i></button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>