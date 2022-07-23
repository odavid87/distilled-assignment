<template>
    <v-row class="mb-2" v-if="beers">
        <v-col
            v-for="(beer, index) in beers"
            :key="index"
            class="beer-card-col"
        >
            <v-card>
                <v-card-text class="text-center">
                    <h6 class="text-h6">{{beer.name}}</h6>
                    <p class="two-line-clamp">
                        {{beer.tagline}}
                    </p>
                    <v-img
                        class="mx-auto"
                        :lazy-src="beer.image_url"
                        width="230"
                        height="345"
                        contain
                        :src="beer.image_url"
                    ></v-img>
                </v-card-text>
            </v-card>
        </v-col>
    </v-row>
</template>
<style>

.two-line-clamp {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    min-height: 44px;
}
.beer-card-col{
    max-width: 20%;
}
</style>
<script>
import {mapState} from "vuex";

export default {
    computed: {
        ...mapState('beerStore', ['beers'])
    }
}
</script>
