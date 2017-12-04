<template>
    <div id="app">
        <panier :panier="panier"></panier>
    </div>
</template>

<script>
    import Panier from './Panier.vue'

    export default {
        name: 'application',
        data () {
            return {
                panier: [
                    { article: "Cahier", quantite: 2, prix: '5.30' },
                    { article: "Crayon", quantite: 4, prix: '1.10' },
                    { article: "Gomme", quantite: 1, prix: '3.25' }
                ]
            }
        },
        components: {
            Panier
        }
    }
</script>