<template>
    <v-container>
        <v-row>
            <v-col cols="12">
                <v-card>
                    <v-card-title>
                        <v-icon>mdi-file-document</v-icon>
                        Lista de protocolos
                    </v-card-title>
                    <v-card-text>
                        <v-container class="py-0">
                            <v-row>
                                <v-col cols="12">
                                    <v-list>
                                        <v-list-item
                                            v-for="thesis_protocol in filteredThesisProtocols"
                                            v-bind:key="thesis_protocol.thesis_protocol_student_id"
                                        >
                                            <v-list-item-content>
                                                <v-list-item-title>
                                                    {{ thesis_protocol.thesis_protocol_title }}
                                                </v-list-item-title>
                                                <v-list-item-subtitle>
                                                    de {{ thesis_protocol.student.name }}
                                                </v-list-item-subtitle>
                                            </v-list-item-content>

                                            <v-btn
                                                v-on:click="
                                                    evaluateThesisProtocol(thesis_protocol.thesis_protocol_student_id)
                                                "
                                                v-if="thesis_protocol.thesis_protocol_status_id == 2"
                                                class="primary"
                                                >Evaluar protocolo</v-btn
                                            >
                                            <div
                                                v-else-if="thesis_protocol.thesis_protocol_status_id == 3"
                                                class="text-md-subtitle-1"
                                            >
                                                REVISADO
                                            </div>
                                            <div
                                                v-else-if="thesis_protocol.thesis_protocol_status_id == 4"
                                                class="text-md-subtitle-1 success--text"
                                            >
                                                APROBADO
                                            </div>
                                            <div
                                                v-else-if="thesis_protocol.thesis_protocol_status_id == 5"
                                                class="text-md-subtitle-1 error--text"
                                            >
                                                RECHAZADO
                                            </div>
                                        </v-list-item>
                                    </v-list>
                                </v-col>
                            </v-row>
                        </v-container>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>
<script>
    import { mapState, mapGetters, mapMutations, mapActions } from 'vuex'
    export default {
        computed: {
            ...mapState('thesisProtocols', ['thesisProtocols']),
            ...mapGetters('thesisProtocols', ['getThesisProtocolsByEvaluatorId']),

            filteredThesisProtocols: function() {
                return this.getThesisProtocolsByEvaluatorId(this.evaluatorId)
            },
        },

        props: {
            evaluatorId: {
                type: Number,
            },
        },

        mounted() {
            this.fetchThesisProtocols()
        },

        methods: {
            ...mapActions('thesisProtocols', ['fetchThesisProtocols']),

            evaluateThesisProtocol: function(thesis_protocol_student_id) {
                window.location.href = 'thesis_protocols/' + thesis_protocol_student_id
            },
        },
    }
</script>
