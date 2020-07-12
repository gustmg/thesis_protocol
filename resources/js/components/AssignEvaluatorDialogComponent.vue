<template>
    <v-dialog v-model="assignEvaluatorDialog" width="450" persistent>
        <template v-slot:activator="{ on, attrs }">
            <v-btn class="primary white--text" v-on="on" v-bind="attrs" :disabled="!evaluators">
                Asignar evaluador
            </v-btn>
        </template>
        <v-card>
            <v-card-title class="justify-center">Elegir evaluador</v-card-title>
            <v-card-text class="pb-0">
                <v-container class="py-0">
                    <v-row>
                        <v-col cols="12">
                            <v-card>
                                <v-text-field
                                    v-model="searchEvaluatorValue"
                                    label="Buscar evaluador..."
                                    flat
                                    solo
                                    hide-details
                                    clearable
                                    clear-icon="mdi-close-circle-outline"
                                ></v-text-field>
                            </v-card>
                        </v-col>
                        <v-col cols="12">
                            <v-card>
                                <v-list class="py-0">
                                    <v-list-item-group>
                                        <v-list-item
                                            v-for="evaluator in evaluators"
                                            v-bind:key="evaluator.id"
                                            v-on:click="assignEvaluatorToThesisProtocol(evaluator.id)"
                                        >
                                            <v-list-item-avatar class="grey">
                                                <v-icon class="white--text">mdi-account-edit</v-icon>
                                            </v-list-item-avatar>
                                            <v-list-item-content>
                                                <v-list-item-title>{{ evaluator.name }}</v-list-item-title>
                                            </v-list-item-content>
                                        </v-list-item>
                                    </v-list-item-group>
                                </v-list>
                            </v-card>
                        </v-col>
                    </v-row>
                </v-container>
                <v-container class="pb-0 pt-0">
                    <v-row justify="center">
                        <v-col cols="6">
                            <v-btn class="primary--text" v-on:click="closeDialog" outlined tile block>Cancelar</v-btn>
                        </v-col>
                    </v-row>
                </v-container>
            </v-card-text>
        </v-card>
    </v-dialog>
</template>
<script>
    import { mapState, mapMutations, mapActions } from 'vuex'
    export default {
        mounted() {
            this.fetchEvaluators()
        },

        computed: {
            ...mapState('evaluators', ['evaluators']),
        },

        props: {
            thesisProtocolId: {
                type: Number,
            },
        },

        data() {
            return {
                searchEvaluatorValue: '',
                assignEvaluatorDialog: false,
            }
        },

        methods: {
            ...mapActions('evaluators', ['fetchEvaluators']),
            ...mapActions('thesisProtocols', ['setEvaluatorToThesisProtocol']),
            closeDialog: function() {
                this.assignEvaluatorDialog = false
            },

            assignEvaluatorToThesisProtocol: function(evaluatorId) {
                this.setEvaluatorToThesisProtocol({ thesisProtocolId: this.thesisProtocolId, evaluatorId })
                this.closeDialog()
            },
        },
    }
</script>
