<template>
<div class="box-address">
  <v-icon color="#FF6060">place</v-icon>
  <p style="float:right;width:85%">
    <strong>{{ endereco }}</strong><br>
    CEP: {{ cep }}<br>
   {{ obs }}
  </p>
  <div style="clear: both;"></div>
</div>
</template>
<script>
export default {
  props: ['endereco','cep','obs']
}
</script>
<style scoped>
.box-address {
  width: 100%;
  padding: 30px 15px;
  border-radius: 15px;
  background-color: white;
  margin-top: 30px;
  margin-bottom: 30px;
  box-shadow: 0px 1px 3px rgba(0,0,0,0.2);
}
.box-address:first-child {
  margin-top: 0px;
}
</style>>
