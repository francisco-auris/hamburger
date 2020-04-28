<template>
<div class="cover" :style="{'background-image': 'url('+img+')' }"/>
</template>
<script>
export default {
    props: ['img']
}
</script>
<style scoped>
.cover {
    border-radius: 10px;
    height: 200px;
    background-size: auto 100%;
    background-color: #FFF;
    background-position: center;
}
</style>