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
                <v-btn
                    color="primary"
                    fab
                    small
                    dark
                    :disabled="!beerPages.prev_page_url"
                    @click="prevPage"
                >
                    <
                </v-btn>
                <v-btn
                    color="primary"
                    fab
                    small
                    dark
                    :disabled="!beerPages.next_page_url"
                    @click="nextPage"
                >
                    >
                </v-btn>
            </v-container>
        </v-main>
        <general-feedback></general-feedback>
    </v-app>
</template>

<script>
import {mapState} from "vuex";

export default {
    computed: {
        ...mapState('beerStore', ['beerPages'])
    },
    methods: {
        nextPage() { this.loadBeers({next: 1});},
        prevPage() { this.loadBeers({prev: 1});},
        loadBeers(page = {}) {
            this.$store.dispatch('beerStore/loadBeers', page);
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
