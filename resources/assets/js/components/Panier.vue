<template>
<div class="panel panel-primary">
<div class="panel-heading">Panier</div>
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th class="col-sm-4">Article</th>
        <th class="col-sm-2">Quantité</th>
        <th class="col-sm-2">Prix</th>
        <th class="col-sm-2">Total</th>
        <th class="col-sm-1"></th>
        <th class="col-sm-1"></th>
    </tr>
    </thead>
    <tbody>
    <tr v-for="(item, index) in panier">
        <td>{{ item.article }}</td>
        <td>{{ item.quantite }}</td>
        <td>{{ item.prix }} €</td>
        <td>{{ (item.quantite * item.prix).toFixed(2) }} €</td>
        <td><button class="btn btn-info btn-block" @click="modifier(index)"><i class="fa fa-edit fa-lg"></i></button></td>
        <td><button class="btn btn-danger btn-block" @click="supprimer(index)"><i class="fa fa-trash-o fa-lg"></i></button></td>
    </tr>
    <tr>
        <td colspan="3"></td>
        <td><strong>{{ total }} €</strong></td>
        <td colspan="2"></td>
    </tr>
    <editeur :article="article" @add="ajouter"></editeur>
    </tbody>
</table>
</div>
</template>

<script>
    import Editeur from './Editeur.vue'

    export default {
        props: ['panier'],
        data: function () {
            return {
                article: { article: '', quantite: 0, prix: 0 }
            }
        },
        computed: {
            total: function () {
                let total = 0;
                this.panier.forEach(function(el) {
                    total += el.prix * el.quantite;
                });
                return total.toFixed(2)
            }
        },
        methods: {
            modifier: function(index) {
                this.article = this.panier[index]
                this.panier.splice(index, 1)
            },
            supprimer: function(index) {
                this.panier.splice(index, 1)
            },
            ajouter: function(input) {
                this.panier.push(input)
                this.article = { article: '', quantite: 0, prix: 0 }
            }
        },
        components: {
            Editeur
        }
    }