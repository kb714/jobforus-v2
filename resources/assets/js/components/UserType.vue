<template>

    <fieldset v-if="data == 4" class="fieldset">
    <legend class="text-center">Datos Personales</legend>
    <div class="form-group">
        <label for="identifier" class="col-md-4 control-label">RUT</label>
        <div class="col-md-6">
            <input id="identifier" type="text" class="form-control" name="identifier" required>
            </div>
        </div>
    </fieldset>

    <fieldset v-else class="fieldset">
    <legend class="text-center">Datos de Empresa</legend>
    </fieldset>
</template>
<script>
    export default{
        props: ['data', 'errors']

    }
</script>
