<template>
    <v-app>
        <v-main class="grey lighten-3">
            <v-container>
                <v-card class="mb-2">
                    <v-card-text>
                        <v-row>
                            <v-col cols="9" class="pa-4">
                                <h1 class="text-h1 pa-4 ml-8">Beer list</h1>
                            </v-col>
                            <div class="d-flex">
                                <v-btn
                                    elevation="2"
                                    x-large
                                    class="align-self-center"
                                    @click="goToRandomPage"
                                >Go to the random page</v-btn>
                            </div>
                        </v-row>
                    </v-card-text>
                </v-card>
                <beer-grid></beer-grid>
            </v-container>
        </v-main>
        <general-feedback></general-feedback>
    </v-app>
</template>

<script>
export default {
    components: {},
    methods: {
        loadBeers() {
            this.$store.dispatch('beerStore/loadBeers');
        },
        goToRandomPage(){
            location.href='/';
        }
    },
    mounted() {
        this.loadBeers();
    }
}
</script>
