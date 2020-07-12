<template>
    <v-container>
        <v-row>
            <v-col cols="6">
                <v-card>
                    <v-card-title>
                        <v-icon>mdi-account-edit</v-icon>
                        Evaluadores
                    </v-card-title>
                    <v-card-text>
                        <v-container class="py-0">
                            <v-row>
                                <v-col cols="3" align="center">
                                    <div class="text-h3">20</div>
                                    <div class="text-subtitle-1">Evaluadores registrados</div>
                                </v-col>
                                <v-col cols="9">
                                    <v-subheader>Notificaciones</v-subheader>
                                    <v-list>
                                        <v-list-item-group>
                                            <v-list-item>
                                                <v-list-item-content>
                                                    <v-list-item-title>
                                                        Hay evaluadores sin estudiantes asignados
                                                    </v-list-item-title>
                                                </v-list-item-content>
                                            </v-list-item>
                                        </v-list-item-group>
                                    </v-list>
                                </v-col>
                            </v-row>
                        </v-container>
                    </v-card-text>
                </v-card>
            </v-col>
            <v-col cols="6">
                <v-card>
                    <v-card-title>
                        <v-icon>mdi-account-group</v-icon>
                        Estudiantes
                    </v-card-title>
                    <v-card-text>
                        <v-container class="py-0">
                            <v-row>
                                <v-col cols="3" align="center">
                                    <div class="text-h3">100</div>
                                    <div class="text-subtitle-1">Estudiantes registrados</div>
                                </v-col>
                                <v-col cols="9">
                                    <v-subheader>Notificaciones</v-subheader>
                                    <v-list>
                                        <v-list-item-group>
                                            <v-list-item>
                                                <v-list-item-content>
                                                    <v-list-item-title>Notificación 1</v-list-item-title>
                                                </v-list-item-content>
                                            </v-list-item>
                                        </v-list-item-group>
                                    </v-list>
                                </v-col>
                            </v-row>
                        </v-container>
                    </v-card-text>
                </v-card>
            </v-col>
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
                                            v-for="thesis_protocol in thesisProtocols"
                                            v-bind:key="thesis_protocol.thesis_protocol_student_id"
                                        >
                                            <v-list-item-content>
                                                <v-list-item-title>
                                                    {{ thesis_protocol.thesis_protocol_title }}
                                                </v-list-item-title>
                                                <v-list-item-subtitle>
                                                    de {{ thesis_protocol.student.name }},
                                                    {{
                                                        setEvaluatorText(
                                                            thesis_protocol.thesis_protocol_status,
                                                            thesis_protocol.evaluator
                                                        )
                                                    }}
                                                </v-list-item-subtitle>
                                            </v-list-item-content>
                                            <assign-evaluator-dialog-component
                                                v-if="thesis_protocol.thesis_protocol_status_id == 2"
                                                :thesis-protocol-id="thesis_protocol.thesis_protocol_student_id"
                                            ></assign-evaluator-dialog-component>
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
    import { mapState, mapMutations, mapActions } from 'vuex'
    export default {
        computed: {
            ...mapState('thesisProtocols', ['thesisProtocols']),
        },

        mounted() {
            this.fetchThesisProtocols()
        },

        methods: {
            ...mapActions('thesisProtocols', ['fetchThesisProtocols']),
            setEvaluatorText: function(thesisProtocolStatus, evaluator) {
                if (!evaluator) {
                    return 'sin evaluador asignado.'
                } else {
                    switch (thesisProtocolStatus.thesis_protocol_status_id) {
                        case 2:
                            return 'en revisión por ' + evaluator.name
                            break
                        case 3:
                            return 'revisado por ' + evaluator.name
                            break
                        case 4:
                            return 'aprobado por ' + evaluator.name
                            break
                        case 5:
                            return 'rechazado por ' + evaluator.name
                            break
                        default:
                            break
                    }
                }
            },
        },
    }
</script>
