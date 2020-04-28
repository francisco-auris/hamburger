<template>
<div>

    <btn-back />

    <v-container>
        <v-row justify="center" >
            <v-col cols="12" sm="6">
                <v-sheet class="px-3 pt-3 pb-3" elevation="4" v-if="!produto.image">
                    <v-skeleton-loader
                    class="mx-auto"
                    max-width="auto"
                    type="image"
                    ></v-skeleton-loader>
                </v-sheet>
                <cover :img="produto.image" v-else />
            </v-col>
        </v-row>
        <v-row justify="center">
            <v-col cols="12" sm="6">
                <center>
                    <h2>{{ produto.title }}</h2>
                    <br>
                    <v-sheet class="px-3 pt-3 pb-3" elevation="4" v-if="!produto.ingredientes">
                        <v-skeleton-loader
                        class="mx-auto"
                        max-width="auto"
                        type="paragraph"
                        ></v-skeleton-loader>
                    </v-sheet>
                    <p class="details" v-else>
                        Ingredientes **
                    </p>
                    

                </center>
            </v-col>
        </v-row>
    </v-container>

    <div class="box-event">
        <center>
            <v-sheet class="px-3 pt-3 pb-3" elevation="4" v-if="!produto.preco">
                <v-skeleton-loader
                class="mx-auto"
                max-width="auto"
                type="chip"
                ></v-skeleton-loader>
            </v-sheet>
            <p v-else>
                <h1><sup>R$</sup> {{ produto.preco }}</h1>
            </p>
            <div class="text-center">
                <v-btn rounded color="primary" dark large>Adicionar ao carrinho <v-icon>add_shopping_cart</v-icon></v-btn>
            </div>
        </center>
    </div>

</div>
</template>
<script>
import Cover from '../components/Cover';
import Theback from '../components/Theback';

export default {
    
    components: {
        'cover': Cover,
        'btn-back': Theback
    },
    data(){
        return {
            produto: Array
        }
    },
    created(){
        this.$http.get('http://localhost:8000/api/produto/'+this.$route.params.id)
            .then(res => res.json(), err => console.log(err))
            .then(produtos => this.produto = produtos);
    }
}
</script>
<style scoped>
.theme--light {
    background-color: transparent !important;
}
.box-event {
    width: 100%;
    height: 200px;
    background-color: #FF6060;
    color: white;
    border-radius: 15px 15px 0px 0px;
    padding: 15px;
    position:static;
    bottom:50px;
}
.details {
    text-align: left;
    border-left: solid 3px #FF6060;
    padding-left: 10px;
    padding-top: 15px;
    padding-bottom: 15px;
}
p { margin-bottom: 20px;}
sup {
    font-size: 12px;
}
h1 {
    font-size: 3em;
}
@media (min-width: 700px ) {
    .box-event {
        position: absolute;
    }
}
@media (min-height: 700px ) {
    .box-event {
        position: absolute;
    }
}
</style>