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
                                                    <v-list-item-title
                                                        >Hay evaluadores sin estudiantes asignados</v-list-item-title
                                                    >
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
                        Gráfica de protocolos
                    </v-card-title>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>
