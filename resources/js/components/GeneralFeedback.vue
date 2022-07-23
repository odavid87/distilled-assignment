<template>
    <div>
        <v-overlay :value="loadingAnimation">
            <v-progress-circular indeterminate size="64"></v-progress-circular>
        </v-overlay>
    </div>
</template>
<script>
export default {
    computed: {
        loadingAnimation() {
            return this.$store.state.feedbackStore.loadingAnimation;
        }
    },
}
</script>
