<template>
    <v-row v-if="beer">
        <v-col>
            <v-card>
                <v-card-text>
                    <v-img
                        contain
                        :lazy-src="beer.image_url"
                        max-height="600"
                        :src="beer.image_url"
                    ></v-img>
                </v-card-text>
            </v-card>
        </v-col>
        <v-col>
            <v-card class="mb-2">
                <v-card-title class="text-h2 mb-2">{{beer.name}}</v-card-title>
                <v-card-subtitle>{{beer.tagline}}</v-card-subtitle>
            </v-card>
            <v-card class="mb-2">
                <v-card-text>
                    <strong>ABV: </strong>{{beer.abv}}% <br>
                    <strong>About:</strong> {{beer.description}}
                </v-card-text>
                <v-card-text>
                    <strong>Brewers tips:</strong> {{beer.brewers_tips}}
                </v-card-text>
                <v-card-text>
                    <strong>Brewery: </strong>{{beer.brewery_location}} <br>
                    <strong>First brewed: </strong>{{beer.first_brewed}}
                </v-card-text>
                <v-card-text>
                    <strong>Food pairing: </strong> <br>
                    <ul>
                        <li
                            v-for="(food, index) in beer.food_pairing"
                            :key="index"
                        >
                            {{food}}
                        </li>
                    </ul>
                </v-card-text>
            </v-card>

        </v-col>
    </v-row>
</template>
<script>
import {mapState} from "vuex";

export default {
    computed: {

        ...mapState('beerStore', ['beer'])
    }
}
</script>
