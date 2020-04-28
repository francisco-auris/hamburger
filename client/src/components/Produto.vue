<template>
    <div class="card">
        <img :src="image">
        <div class="texto">
            <h2>{{ title }}</h2>
            <span>R$ {{ preco }}</span>
        </div>
        <div style="clear: both;"></div> 
    </div>
</template>
<script>
export default {
    props: [
        'image','title','preco'
    ]
}
</script>
<style scoped>
.card {
    width: 100%;
    padding: 25px;
    border-radius: 10px;
}
img {
    display: inline-block;
    width: 40%;
    float: left;
}
.texto {
    width: 60%;
    display: inline-block;
    vertical-align: top;
    float: right;
    text-align: left;
    padding-left: 10px;
}
span {
    color: #FF6060;
}
</style>