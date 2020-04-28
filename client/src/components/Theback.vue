<template>
    <v-btn text color="primary" @click="theBack()">
        <v-icon style="color: #AAA">keyboard_backspace</v-icon>
    </v-btn>
</template>
<script>
export default {
    methods: {
        theBack(){
            window.history.back();
        }
    }
}
</script>