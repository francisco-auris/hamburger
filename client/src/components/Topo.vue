<template>
    <!--<div class="topo">
        NOME DO USUARIO
    </div>-->
    <div>
        <v-app-bar
        fixed
        color="deep-purple accent-4"
        :light="true"
        :elevation="0"
        :flat="true"
        class="bg-white"
        >

            <v-spacer>
                <span class="font-weight-black">Auris maciel</span>
            </v-spacer>

        </v-app-bar>
    </div>
</template>
<style scoped>
.topo {
    width: 100%;
    height: 60px;
    position: fixed;
    top: 0;
    background-color: white;
    line-height: 60px;
    padding-left: 20px;
    font-weight: bold;
    z-index: 999;
}
.bg-white {
    background-color: white !important;
    padding-left: 5px;
}
.font-weight-black {
    font-weight: bold;
}
</style>