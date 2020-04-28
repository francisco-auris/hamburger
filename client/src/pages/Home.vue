<template>
<div>

    <v-container class="grey lighten-5">
    <v-row
      class="mb-6"
      no-gutters
    >
      <v-col>
        <v-card
          class="cover"
          tile
        />
        <h2>Ofertas</h2>
      </v-col>
      
      
    </v-row>
  <v-row class="mb-6" >
        <v-col cols="12" sm="12" >
            <v-sheet class="px-3 pt-3 pb-3" >
                <v-skeleton-loader
                class="mx-auto"
                max-width="auto"
                type="list-item-avatar-three-line"
                ></v-skeleton-loader>

                <v-skeleton-loader
                class="mx-auto"
                max-width="auto"
                type="list-item-avatar-three-line"
                ></v-skeleton-loader>
            </v-sheet>
        </v-col>
    </v-row>
    

  </v-container>

</div>
</template>
<style scoped>
.cover {
    border-radius: 10px;
    height: 200px;
    background-image: url('../assets/cover.jpg');
    background-size: 100% 100%;
}
h2 {
    color: #FF6060;
    margin-top: 20px;
}
</style>