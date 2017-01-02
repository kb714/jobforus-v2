<div class="row">
    <div class="col-xs-12 text-center">
        <div class="landing-title">Panel de Control</div>
        <img src="/images/separator.png" alt="Separador" width="100%">
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="alert alert-primary text-center">
            <b> Su plan actual es</b>: Cuenta {{Auth::user()->membership->plan->name}}
        </div>
    </div>
</div>