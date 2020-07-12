<template>
    <v-container>
        <v-row>
            <v-col cols="12">
                <v-stepper v-model="thesisProtocolStepper" alt-labels>
                    <v-stepper-header>
                        <v-stepper-step step="1">
                            Datos generales
                        </v-stepper-step>
                        <v-divider></v-divider>
                        <v-stepper-step step="2">
                            <div class="text-center">Descripción del proyecto</div>
                        </v-stepper-step>
                        <v-divider></v-divider>
                        <v-stepper-step step="3">
                            <div class="text-center">Revisión de proyecto</div>
                        </v-stepper-step>
                    </v-stepper-header>
                    <v-stepper-content step="1">
                        <v-container>
                            <div class="text-subheader-2">Titulo del proyecto</div>
                            <v-row class="pb-4">
                                <v-col cols="12" class="pb-0">
                                    <v-text-field
                                        v-model="thesisProtocol.thesis_protocol_title"
                                        placeholder="Ingrese el título de su tésis..."
                                        outlined
                                        readonly
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="12" class="pt-0">
                                    <v-card>
                                        <v-card-title>Evaluación de título de proyecto</v-card-title>
                                        <v-card-text>
                                            <div class="text-md-subtitle-1">¿Cómo desea evaluar este campo?</div>
                                            <v-radio-group v-model="titleStatus" row>
                                                <v-radio label="Completo" value="1"></v-radio>
                                                <v-radio label="Regular" value="2"></v-radio>
                                                <v-radio label="Incompleto" value="3"></v-radio>
                                            </v-radio-group>
                                            <v-text-field
                                                v-model="titleCommentary"
                                                label="Observación..."
                                                outlined
                                            ></v-text-field>
                                            <div class="text-md-subtitle-2 text--primary ">
                                                Observaciones anteriores
                                            </div>
                                            <v-list v-if="titleCommentaries.length != 0">
                                                <v-list-item
                                                    v-for="commentary in titleCommentaries"
                                                    v-bind:key="commentary.commentary_id"
                                                >
                                                    <v-list-item-icon class="mr-4">
                                                        <v-icon>mdi-comment</v-icon>
                                                    </v-list-item-icon>
                                                    <v-list-item-content>
                                                        <v-list-item-title>
                                                            {{ commentary }}
                                                        </v-list-item-title>
                                                    </v-list-item-content>
                                                </v-list-item>
                                            </v-list>
                                            <div class="text-md-subtitle-1" v-else>No hay observaciones agregadas.</div>
                                        </v-card-text>
                                    </v-card>
                                </v-col>
                            </v-row>
                            <div class="text-subheader-2">Institución de realización</div>
                            <v-row class="pb-4">
                                <v-col cols="6" class="pb-0">
                                    <v-text-field
                                        v-model="thesisProtocol.thesis_protocol_institution_name"
                                        label="Nombre de la institución"
                                        outlined
                                        readonly
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="6" class="pb-0">
                                    <v-text-field
                                        v-model="thesisProtocol.thesis_protocol_institution_department"
                                        label="Departamento"
                                        outlined
                                        readonly
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="9" class="pb-0">
                                    <v-text-field
                                        v-model="thesisProtocol.thesis_protocol_institution_address"
                                        label="Dirección"
                                        outlined
                                        readonly
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="3" class="pb-0">
                                    <v-text-field
                                        v-model="thesisProtocol.thesis_protocol_institution_phone"
                                        label="Teléfono"
                                        outlined
                                        readonly
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="12" class="py-0">
                                    <v-card>
                                        <v-card-title>Evaluación de institución de realización</v-card-title>
                                        <v-card-text>
                                            <div class="text-md-subtitle-1">¿Cómo desea evaluar este campo?</div>
                                            <v-radio-group v-model="institutionStatus" row>
                                                <v-radio label="Completo" value="1"></v-radio>
                                                <v-radio label="Regular" value="2"></v-radio>
                                                <v-radio label="Incompleto" value="3"></v-radio>
                                            </v-radio-group>
                                            <v-text-field
                                                v-model="institutionCommentary"
                                                label="Observación..."
                                                outlined
                                            ></v-text-field>
                                            <div class="text-md-subtitle-2 text--primary ">
                                                Observaciones anteriores
                                            </div>
                                            <v-list v-if="institutionCommentaries.length != 0">
                                                <v-list-item
                                                    v-for="commentary in institutionCommentaries"
                                                    v-bind:key="commentary.commentary_id"
                                                >
                                                    <v-list-item-icon class="mr-4">
                                                        <v-icon>mdi-comment</v-icon>
                                                    </v-list-item-icon>
                                                    <v-list-item-content>
                                                        <v-list-item-title>
                                                            {{ commentary }}
                                                        </v-list-item-title>
                                                    </v-list-item-content>
                                                </v-list-item>
                                            </v-list>
                                            <div class="text-md-subtitle-1" v-else>No hay observaciones agregadas.</div>
                                        </v-card-text>
                                    </v-card>
                                </v-col>
                            </v-row>
                            <div class="text-subheader-2">Beca de tésis (Opcional)</div>
                            <v-row v-if="thesisProtocol.thesis_protocol_scholarship_institution" class="pb-4">
                                <v-col cols="6" class="pb-0">
                                    <v-text-field
                                        v-model="thesisProtocol.thesis_protocol_scholarship_institution"
                                        label="Institución que otorga la beca"
                                        outlined
                                        readonly
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="3" class="pb-0">
                                    <v-text-field
                                        v-model="thesisProtocol.thesis_protocol_scholarship_type"
                                        label="Tipo de beca"
                                        outlined
                                        readonly
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="3" class="pb-0">
                                    <v-text-field
                                        v-model="thesisProtocol.thesis_protocol_scholarship_vigency"
                                        label="Vigencia"
                                        outlined
                                        readonly
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="12" class="py-0">
                                    <v-card>
                                        <v-card-title>Evaluación de beca de tésis</v-card-title>
                                        <v-card-text>
                                            <div class="text-md-subtitle-1">¿Cómo desea evaluar este campo?</div>
                                            <v-radio-group v-model="scholarshipStatus" row>
                                                <v-radio label="Completo" value="1"></v-radio>
                                                <v-radio label="Regular" value="2"></v-radio>
                                                <v-radio label="Incompleto" value="3"></v-radio>
                                            </v-radio-group>
                                            <v-text-field
                                                v-model="scholarshipCommentary"
                                                label="Observación..."
                                                outlined
                                            ></v-text-field>
                                            <div class="text-md-subtitle-2 text--primary ">
                                                Observaciones anteriores
                                            </div>
                                            <v-list v-if="scholarshipCommentaries.length != 0">
                                                <v-list-item
                                                    v-for="commentary in scholarshipCommentaries"
                                                    v-bind:key="commentary.commentary_id"
                                                >
                                                    <v-list-item-icon class="mr-4">
                                                        <v-icon>mdi-comment</v-icon>
                                                    </v-list-item-icon>
                                                    <v-list-item-content>
                                                        <v-list-item-title>
                                                            {{ commentary }}
                                                        </v-list-item-title>
                                                    </v-list-item-content>
                                                </v-list-item>
                                            </v-list>
                                            <div class="text-md-subtitle-1" v-else>No hay observaciones agregadas.</div>
                                        </v-card-text>
                                    </v-card>
                                </v-col>
                            </v-row>
                            <v-row v-else class="pb-4">
                                <v-col cols="12" align="center">El protocolo de tésis no cuenta con beca</v-col>
                            </v-row>
                            <div class="text-subheader-2">Asesor 1</div>
                            <v-row class="pb-4">
                                <v-col cols="6">
                                    <v-text-field
                                        v-model="thesisProtocol.thesis_protocol_assessor_name"
                                        label="Nombre del asesor"
                                        outlined
                                        readonly
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="3">
                                    <v-text-field
                                        v-model="thesisProtocol.thesis_protocol_assessor_academic_degree"
                                        label="Grado académico del asesor"
                                        outlined
                                        readonly
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="3">
                                    <v-text-field
                                        v-model="thesisProtocol.thesis_protocol_assessor_phone"
                                        label="Teléfono particular"
                                        outlined
                                        readonly
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="6">
                                    <v-text-field
                                        v-model="thesisProtocol.thesis_protocol_assessor_institution"
                                        label="Institución"
                                        outlined
                                        readonly
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="6">
                                    <v-text-field
                                        v-model="thesisProtocol.thesis_protocol_assessor_adscription_department"
                                        label="Departamento de adscripción"
                                        outlined
                                        readonly
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="9">
                                    <v-text-field
                                        v-model="thesisProtocol.thesis_protocol_assessor_address"
                                        label="Dirección"
                                        outlined
                                        readonly
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="3">
                                    <v-text-field
                                        v-model="thesisProtocol.thesis_protocol_assessor_job_phone"
                                        label="Teléfono"
                                        outlined
                                        readonly
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="12" class="py-0">
                                    <v-card>
                                        <v-card-title>Evaluación de asesor</v-card-title>
                                        <v-card-text>
                                            <div class="text-md-subtitle-1">¿Cómo desea evaluar este campo?</div>
                                            <v-radio-group v-model="assessorStatus" row>
                                                <v-radio label="Completo" value="1"></v-radio>
                                                <v-radio label="Regular" value="2"></v-radio>
                                                <v-radio label="Incompleto" value="3"></v-radio>
                                            </v-radio-group>
                                            <v-text-field
                                                v-model="assessorCommentary"
                                                label="Observación..."
                                                outlined
                                            ></v-text-field>
                                            <div class="text-md-subtitle-2 text--primary ">
                                                Observaciones anteriores
                                            </div>
                                            <v-list v-if="assessorCommentaries.length != 0">
                                                <v-list-item
                                                    v-for="commentary in assessorCommentaries"
                                                    v-bind:key="commentary.commentary_id"
                                                >
                                                    <v-list-item-icon class="mr-4">
                                                        <v-icon>mdi-comment</v-icon>
                                                    </v-list-item-icon>
                                                    <v-list-item-content>
                                                        <v-list-item-title>
                                                            {{ commentary }}
                                                        </v-list-item-title>
                                                    </v-list-item-content>
                                                </v-list-item>
                                            </v-list>
                                            <div class="text-md-subtitle-1" v-else>No hay observaciones agregadas.</div>
                                        </v-card-text>
                                    </v-card>
                                </v-col>
                            </v-row>
                            <div class="text-subheader-2">Asesor 2 (Opcional)</div>
                            <v-row v-if="thesisProtocol.thesis_protocol_second_assessor_name" class="pb-4">
                                <v-col cols="6">
                                    <v-text-field
                                        v-model="thesisProtocol.thesis_protocol_second_assessor_name"
                                        label="Nombre del asesor"
                                        outlined
                                        readonly
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="3">
                                    <v-text-field
                                        v-model="thesisProtocol.thesis_protocol_second_assessor_academic_degree"
                                        label="Grado académico del asesor"
                                        outlined
                                        readonly
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="3">
                                    <v-text-field
                                        v-model="thesisProtocol.thesis_protocol_second_assessor_phone"
                                        label="Teléfono particular"
                                        outlined
                                        readonly
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="6">
                                    <v-text-field
                                        v-model="thesisProtocol.thesis_protocol_second_assessor_institution"
                                        label="Institución"
                                        outlined
                                        readonly
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="6">
                                    <v-text-field
                                        v-model="thesisProtocol.thesis_protocol_second_assessor_adscription_department"
                                        label="Departamento de adscripción"
                                        outlined
                                        readonly
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="9">
                                    <v-text-field
                                        v-model="thesisProtocol.thesis_protocol_second_assessor_address"
                                        label="Dirección"
                                        outlined
                                        readonly
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="3">
                                    <v-text-field
                                        v-model="thesisProtocol.thesis_protocol_second_assessor_job_phone"
                                        label="Teléfono"
                                        outlined
                                        readonly
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="12">
                                    <v-textarea
                                        v-model="thesisProtocol.thesis_protocol_second_assessor_justification"
                                        rows="6"
                                        outlined
                                        readonly
                                        no-resize
                                        label="Justificación"
                                    >
                                    </v-textarea>
                                </v-col>
                                <v-col cols="12" class="py-0">
                                    <v-card>
                                        <v-card-title>Evaluación de segundo asesor</v-card-title>
                                        <v-card-text>
                                            <div class="text-md-subtitle-1">¿Cómo desea evaluar este campo?</div>
                                            <v-radio-group v-model="secondAssessorStatus" row>
                                                <v-radio label="Completo" value="1"></v-radio>
                                                <v-radio label="Regular" value="2"></v-radio>
                                                <v-radio label="Incompleto" value="3"></v-radio>
                                            </v-radio-group>
                                            <v-text-field
                                                v-model="secondAssessorCommentary"
                                                label="Observación..."
                                                outlined
                                            ></v-text-field>
                                            <div class="text-md-subtitle-2 text--primary ">
                                                Observaciones anteriores
                                            </div>
                                            <v-list v-if="secondAssessorCommentaries.length != 0">
                                                <v-list-item
                                                    v-for="commentary in secondAssessorCommentaries"
                                                    v-bind:key="commentary.commentary_id"
                                                >
                                                    <v-list-item-icon class="mr-4">
                                                        <v-icon>mdi-comment</v-icon>
                                                    </v-list-item-icon>
                                                    <v-list-item-content>
                                                        <v-list-item-title>
                                                            {{ commentary }}
                                                        </v-list-item-title>
                                                    </v-list-item-content>
                                                </v-list-item>
                                            </v-list>
                                            <div class="text-md-subtitle-1" v-else>No hay observaciones agregadas.</div>
                                        </v-card-text>
                                    </v-card>
                                </v-col>
                            </v-row>
                            <v-row v-else class="pb-4">
                                <v-col cols="12" align="center">El protocolo de tésis no tiene segundo asesor</v-col>
                            </v-row>
                            <v-row>
                                <v-col cols="12" align="right" class="py-0">
                                    <v-btn color="primary" v-on:click="thesisProtocolStepper++">
                                        Siguiente paso
                                    </v-btn>
                                </v-col>
                            </v-row>
                        </v-container>
                    </v-stepper-content>
                    <v-stepper-content step="2">
                        <v-container>
                            <div class="text-h6">Resumen</div>
                            <v-row>
                                <v-col cols="12">
                                    <div v-html="this.thesisProtocol.thesis_protocol_summary"></div>
                                </v-col>
                                <v-col cols="12" class="py-0">
                                    <v-card>
                                        <v-card-title>Evaluación de resumen</v-card-title>
                                        <v-card-text>
                                            <div class="text-md-subtitle-2 text--primary">
                                                ¿Cómo desea evaluar este campo?
                                            </div>
                                            <v-radio-group v-model="summaryStatus" row>
                                                <v-radio label="Completo" value="1"></v-radio>
                                                <v-radio label="Regular" value="2"></v-radio>
                                                <v-radio label="Incompleto" value="3"></v-radio>
                                            </v-radio-group>
                                            <div class="text-md-subtitle-2 text--primary pb-4">
                                                Agregue una observación (Opcional)
                                            </div>
                                            <v-text-field
                                                v-model="summaryCommentary"
                                                label="Observación..."
                                                outlined
                                            ></v-text-field>
                                            <div class="text-md-subtitle-2 text--primary">
                                                Observaciones anteriores
                                            </div>
                                            <v-list v-if="summaryCommentaries.length != 0">
                                                <v-list-item
                                                    v-for="commentary in summaryCommentaries"
                                                    v-bind:key="commentary.commentary_id"
                                                >
                                                    <v-list-item-icon class="mr-4">
                                                        <v-icon>mdi-comment</v-icon>
                                                    </v-list-item-icon>
                                                    <v-list-item-content>
                                                        <v-list-item-title>
                                                            {{ commentary }}
                                                        </v-list-item-title>
                                                    </v-list-item-content>
                                                </v-list-item>
                                            </v-list>
                                            <div class="text-md-subtitle-1" v-else>No hay observaciones agregadas.</div>
                                        </v-card-text>
                                    </v-card>
                                </v-col>
                            </v-row>
                            <div class="text-h6 pt-12">Antecedentes del proyecto</div>
                            <v-row>
                                <v-col cols="12">
                                    <div v-html="this.thesisProtocol.thesis_protocol_antecedent"></div>
                                </v-col>
                                <v-col cols="12" class="py-0">
                                    <v-card>
                                        <v-card-title>Evaluación de antecedentes</v-card-title>
                                        <v-card-text>
                                            <div class="text-md-subtitle-1">¿Cómo desea evaluar este campo?</div>
                                            <v-radio-group v-model="antecedentStatus" row>
                                                <v-radio label="Completo" value="1"></v-radio>
                                                <v-radio label="Regular" value="2"></v-radio>
                                                <v-radio label="Incompleto" value="3"></v-radio>
                                            </v-radio-group>
                                            <v-text-field
                                                v-model="antecedentCommentary"
                                                label="Observación..."
                                                outlined
                                            ></v-text-field>
                                            <div class="text-md-subtitle-2 text--primary ">
                                                Observaciones anteriores
                                            </div>
                                            <v-list v-if="antecedentCommentaries.length != 0">
                                                <v-list-item
                                                    v-for="commentary in antecedentCommentaries"
                                                    v-bind:key="commentary.commentary_id"
                                                >
                                                    <v-list-item-icon class="mr-4">
                                                        <v-icon>mdi-comment</v-icon>
                                                    </v-list-item-icon>
                                                    <v-list-item-content>
                                                        <v-list-item-title>
                                                            {{ commentary }}
                                                        </v-list-item-title>
                                                    </v-list-item-content>
                                                </v-list-item>
                                            </v-list>
                                            <div class="text-md-subtitle-1" v-else>No hay observaciones agregadas.</div>
                                        </v-card-text>
                                    </v-card>
                                </v-col>
                            </v-row>
                            <div class="text-h6 pt-12">Objetivos generales y específicos del proyecto</div>
                            <v-row>
                                <v-col cols="12">
                                    <div v-html="this.thesisProtocol.thesis_protocol_general_objective"></div>
                                </v-col>
                                <v-col cols="12" class="py-0">
                                    <v-card>
                                        <v-card-title
                                            >Evaluación de objetivos generales y específicos del proyecto</v-card-title
                                        >
                                        <v-card-text>
                                            <div class="text-md-subtitle-1">¿Cómo desea evaluar este campo?</div>
                                            <v-radio-group v-model="generalObjectiveStatus" row>
                                                <v-radio label="Completo" value="1"></v-radio>
                                                <v-radio label="Regular" value="2"></v-radio>
                                                <v-radio label="Incompleto" value="3"></v-radio>
                                            </v-radio-group>
                                            <v-text-field
                                                v-model="generalObjectiveCommentary"
                                                label="Observación..."
                                                outlined
                                            ></v-text-field>
                                            <div class="text-md-subtitle-2 text--primary ">
                                                Observaciones anteriores
                                            </div>
                                            <v-list v-if="generalObjectiveCommentaries.length != 0">
                                                <v-list-item
                                                    v-for="commentary in generalObjectiveCommentaries"
                                                    v-bind:key="commentary.commentary_id"
                                                >
                                                    <v-list-item-icon class="mr-4">
                                                        <v-icon>mdi-comment</v-icon>
                                                    </v-list-item-icon>
                                                    <v-list-item-content>
                                                        <v-list-item-title>
                                                            {{ commentary }}
                                                        </v-list-item-title>
                                                    </v-list-item-content>
                                                </v-list-item>
                                            </v-list>
                                            <div class="text-md-subtitle-1" v-else>No hay observaciones agregadas.</div>
                                        </v-card-text>
                                    </v-card>
                                </v-col>
                            </v-row>
                            <div class="text-h6 pt-12">Metodología</div>
                            <v-row>
                                <v-col cols="12">
                                    <div v-html="this.thesisProtocol.thesis_protocol_methodology"></div>
                                </v-col>
                                <v-col cols="12" class="py-0">
                                    <v-card>
                                        <v-card-title>Evaluación de metodología</v-card-title>
                                        <v-card-text>
                                            <div class="text-md-subtitle-1">¿Cómo desea evaluar este campo?</div>
                                            <v-radio-group v-model="methodologyStatus" row>
                                                <v-radio label="Completo" value="1"></v-radio>
                                                <v-radio label="Regular" value="2"></v-radio>
                                                <v-radio label="Incompleto" value="3"></v-radio>
                                            </v-radio-group>
                                            <v-text-field
                                                v-model="methodologyCommentary"
                                                label="Observación..."
                                                outlined
                                            ></v-text-field>
                                            <div class="text-md-subtitle-2 text--primary ">
                                                Observaciones anteriores
                                            </div>
                                            <v-list v-if="methodologyCommentaries.length != 0">
                                                <v-list-item
                                                    v-for="commentary in methodologyCommentaries"
                                                    v-bind:key="commentary.commentary_id"
                                                >
                                                    <v-list-item-icon class="mr-4">
                                                        <v-icon>mdi-comment</v-icon>
                                                    </v-list-item-icon>
                                                    <v-list-item-content>
                                                        <v-list-item-title>
                                                            {{ commentary }}
                                                        </v-list-item-title>
                                                    </v-list-item-content>
                                                </v-list-item>
                                            </v-list>
                                            <div class="text-md-subtitle-1" v-else>No hay observaciones agregadas.</div>
                                        </v-card-text>
                                    </v-card>
                                </v-col>
                            </v-row>
                            <div class="text-h6 pt-12">Cronograma de actividades</div>
                            <v-row>
                                <v-col cols="12">
                                    <div v-html="this.thesisProtocol.thesis_protocol_schedule"></div>
                                </v-col>
                                <v-col cols="12" class="py-0">
                                    <v-card>
                                        <v-card-title>Evaluación de cronograma de actividades</v-card-title>
                                        <v-card-text>
                                            <div class="text-md-subtitle-1">¿Cómo desea evaluar este campo?</div>
                                            <v-radio-group v-model="scheduleStatus" row>
                                                <v-radio label="Completo" value="1"></v-radio>
                                                <v-radio label="Regular" value="2"></v-radio>
                                                <v-radio label="Incompleto" value="3"></v-radio>
                                            </v-radio-group>
                                            <v-text-field
                                                v-model="scheduleCommentary"
                                                label="Observación..."
                                                outlined
                                            ></v-text-field>
                                            <div class="text-md-subtitle-2 text--primary ">
                                                Observaciones anteriores
                                            </div>
                                            <v-list v-if="scheduleCommentaries.length != 0">
                                                <v-list-item
                                                    v-for="commentary in scheduleCommentaries"
                                                    v-bind:key="commentary.commentary_id"
                                                >
                                                    <v-list-item-icon class="mr-4">
                                                        <v-icon>mdi-comment</v-icon>
                                                    </v-list-item-icon>
                                                    <v-list-item-content>
                                                        <v-list-item-title>
                                                            {{ commentary }}
                                                        </v-list-item-title>
                                                    </v-list-item-content>
                                                </v-list-item>
                                            </v-list>
                                            <div class="text-md-subtitle-1" v-else>No hay observaciones agregadas.</div>
                                        </v-card-text>
                                    </v-card>
                                </v-col>
                            </v-row>
                            <div class="text-h6 pt-12">Infraestructura</div>
                            <v-row>
                                <v-col cols="12">
                                    <div v-html="this.thesisProtocol.thesis_protocol_infrastructure"></div>
                                </v-col>
                                <v-col cols="12" class="py-0">
                                    <v-card>
                                        <v-card-title>Evaluación de infraestructura</v-card-title>
                                        <v-card-text>
                                            <div class="text-md-subtitle-1">¿Cómo desea evaluar este campo?</div>
                                            <v-radio-group v-model="infrastructureStatus" row>
                                                <v-radio label="Completo" value="1"></v-radio>
                                                <v-radio label="Regular" value="2"></v-radio>
                                                <v-radio label="Incompleto" value="3"></v-radio>
                                            </v-radio-group>
                                            <v-text-field
                                                v-model="infrastructureCommentary"
                                                label="Observación..."
                                                outlined
                                            ></v-text-field>
                                            <div class="text-md-subtitle-2 text--primary ">
                                                Observaciones anteriores
                                            </div>
                                            <v-list v-if="infrastructureCommentaries.length != 0">
                                                <v-list-item
                                                    v-for="commentary in infrastructureCommentaries"
                                                    v-bind:key="commentary.commentary_id"
                                                >
                                                    <v-list-item-icon class="mr-4">
                                                        <v-icon>mdi-comment</v-icon>
                                                    </v-list-item-icon>
                                                    <v-list-item-content>
                                                        <v-list-item-title>
                                                            {{ commentary }}
                                                        </v-list-item-title>
                                                    </v-list-item-content>
                                                </v-list-item>
                                            </v-list>
                                            <div class="text-md-subtitle-1" v-else>No hay observaciones agregadas.</div>
                                        </v-card-text>
                                    </v-card>
                                </v-col>
                            </v-row>
                            <div class="text-h6 pt-12">Estado del campo del arte</div>
                            <v-row>
                                <v-col cols="12">
                                    <div v-html="this.thesisProtocol.thesis_protocol_art_state"></div>
                                </v-col>
                                <v-col cols="12" class="py-0">
                                    <v-card>
                                        <v-card-title>Evaluación de estado del arte</v-card-title>
                                        <v-card-text>
                                            <div class="text-md-subtitle-1">¿Cómo desea evaluar este campo?</div>
                                            <v-radio-group v-model="artStateStatus" row>
                                                <v-radio label="Completo" value="1"></v-radio>
                                                <v-radio label="Regular" value="2"></v-radio>
                                                <v-radio label="Incompleto" value="3"></v-radio>
                                            </v-radio-group>
                                            <v-text-field
                                                v-model="artStateCommentary"
                                                label="Observación..."
                                                outlined
                                            ></v-text-field>
                                            <div class="text-md-subtitle-2 text--primary ">
                                                Observaciones anteriores
                                            </div>
                                            <v-list v-if="artStateCommentaries.length != 0">
                                                <v-list-item
                                                    v-for="commentary in artStateCommentaries"
                                                    v-bind:key="commentary.commentary_id"
                                                >
                                                    <v-list-item-icon class="mr-4">
                                                        <v-icon>mdi-comment</v-icon>
                                                    </v-list-item-icon>
                                                    <v-list-item-content>
                                                        <v-list-item-title>
                                                            {{ commentary }}
                                                        </v-list-item-title>
                                                    </v-list-item-content>
                                                </v-list-item>
                                            </v-list>
                                            <div class="text-md-subtitle-1" v-else>No hay observaciones agregadas.</div>
                                        </v-card-text>
                                    </v-card>
                                </v-col>
                            </v-row>
                            <div class="text-h6 pt-12">Resultados esperados</div>
                            <v-row>
                                <v-col cols="12">
                                    <div v-html="this.thesisProtocol.thesis_protocol_expected_results"></div>
                                </v-col>
                                <v-col cols="12" class="py-0">
                                    <v-card>
                                        <v-card-title>Evaluación de resultados esperados</v-card-title>
                                        <v-card-text>
                                            <div class="text-md-subtitle-1">¿Cómo desea evaluar este campo?</div>
                                            <v-radio-group v-model="expectedResultsStatus" row>
                                                <v-radio label="Completo" value="1"></v-radio>
                                                <v-radio label="Regular" value="2"></v-radio>
                                                <v-radio label="Incompleto" value="3"></v-radio>
                                            </v-radio-group>
                                            <v-text-field
                                                v-model="expectedResultsCommentary"
                                                label="Observación..."
                                                outlined
                                            ></v-text-field>
                                            <div class="text-md-subtitle-2 text--primary ">
                                                Observaciones anteriores
                                            </div>
                                            <v-list v-if="expectedResultsCommentaries.length != 0">
                                                <v-list-item
                                                    v-for="commentary in expectedResultsCommentaries"
                                                    v-bind:key="commentary.commentary_id"
                                                >
                                                    <v-list-item-icon class="mr-4">
                                                        <v-icon>mdi-comment</v-icon>
                                                    </v-list-item-icon>
                                                    <v-list-item-content>
                                                        <v-list-item-title>
                                                            {{ commentary }}
                                                        </v-list-item-title>
                                                    </v-list-item-content>
                                                </v-list-item>
                                            </v-list>
                                            <div class="text-md-subtitle-1" v-else>No hay observaciones agregadas.</div>
                                        </v-card-text>
                                    </v-card>
                                </v-col>
                            </v-row>
                            <div class="text-h6 pt-12">Impacto socioeconómico</div>
                            <v-row>
                                <v-col cols="12">
                                    <div v-html="this.thesisProtocol.thesis_protocol_socioeconomic_impact"></div>
                                </v-col>
                                <v-col cols="12" class="py-0">
                                    <v-card>
                                        <v-card-title>Evaluación de impacto socioeconómico</v-card-title>
                                        <v-card-text>
                                            <div class="text-md-subtitle-1">¿Cómo desea evaluar este campo?</div>
                                            <v-radio-group v-model="socioeconomicImpactStatus" row>
                                                <v-radio label="Completo" value="1"></v-radio>
                                                <v-radio label="Regular" value="2"></v-radio>
                                                <v-radio label="Incompleto" value="3"></v-radio>
                                            </v-radio-group>
                                            <v-text-field
                                                v-model="socioeconomicImpactCommentary"
                                                label="Observación..."
                                                outlined
                                            ></v-text-field>
                                            <div class="text-md-subtitle-2 text--primary ">
                                                Observaciones anteriores
                                            </div>
                                            <v-list v-if="socioeconomicImpactCommentaries.length != 0">
                                                <v-list-item
                                                    v-for="commentary in socioeconomicImpactCommentaries"
                                                    v-bind:key="commentary.commentary_id"
                                                >
                                                    <v-list-item-icon class="mr-4">
                                                        <v-icon>mdi-comment</v-icon>
                                                    </v-list-item-icon>
                                                    <v-list-item-content>
                                                        <v-list-item-title>
                                                            {{ commentary }}
                                                        </v-list-item-title>
                                                    </v-list-item-content>
                                                </v-list-item>
                                            </v-list>
                                            <div class="text-md-subtitle-1" v-else>No hay observaciones agregadas.</div>
                                        </v-card-text>
                                    </v-card>
                                </v-col>
                            </v-row>
                            <div class="text-h6 pt-12">Aportaciones</div>
                            <v-row>
                                <v-col cols="12">
                                    <div v-html="this.thesisProtocol.thesis_protocol_contributions"></div>
                                </v-col>
                                <v-col cols="12" class="py-0">
                                    <v-card>
                                        <v-card-title>Evaluación de aportaciones</v-card-title>
                                        <v-card-text>
                                            <div class="text-md-subtitle-1">¿Cómo desea evaluar este campo?</div>
                                            <v-radio-group v-model="contributionsStatus" row>
                                                <v-radio label="Completo" value="1"></v-radio>
                                                <v-radio label="Regular" value="2"></v-radio>
                                                <v-radio label="Incompleto" value="3"></v-radio>
                                            </v-radio-group>
                                            <v-text-field
                                                v-model="contributionsCommentary"
                                                label="Observación..."
                                                outlined
                                            ></v-text-field>
                                            <div class="text-md-subtitle-2 text--primary ">
                                                Observaciones anteriores
                                            </div>
                                            <v-list v-if="contributionsCommentaries.length != 0">
                                                <v-list-item
                                                    v-for="commentary in contributionsCommentaries"
                                                    v-bind:key="commentary.commentary_id"
                                                >
                                                    <v-list-item-icon class="mr-4">
                                                        <v-icon>mdi-comment</v-icon>
                                                    </v-list-item-icon>
                                                    <v-list-item-content>
                                                        <v-list-item-title>
                                                            {{ commentary }}
                                                        </v-list-item-title>
                                                    </v-list-item-content>
                                                </v-list-item>
                                            </v-list>
                                            <div class="text-md-subtitle-1" v-else>No hay observaciones agregadas.</div>
                                        </v-card-text>
                                    </v-card>
                                </v-col>
                            </v-row>
                            <div class="text-h6 pt-12">Bibliografía</div>
                            <v-row>
                                <v-col cols="12">
                                    <div v-html="this.thesisProtocol.thesis_protocol_bibliography"></div>
                                </v-col>
                                <v-col cols="12" class="py-0">
                                    <v-card>
                                        <v-card-title>Evaluación de bibliografía</v-card-title>
                                        <v-card-text>
                                            <div class="text-md-subtitle-1">¿Cómo desea evaluar este campo?</div>
                                            <v-radio-group v-model="bibliographyStatus" row>
                                                <v-radio label="Completo" value="1"></v-radio>
                                                <v-radio label="Regular" value="2"></v-radio>
                                                <v-radio label="Incompleto" value="3"></v-radio>
                                            </v-radio-group>
                                            <v-text-field
                                                v-model="bibliographyCommentary"
                                                label="Observación..."
                                                outlined
                                            ></v-text-field>
                                            <div class="text-md-subtitle-2 text--primary ">
                                                Observaciones anteriores
                                            </div>
                                            <v-list v-if="bibliographyCommentaries.length != 0">
                                                <v-list-item
                                                    v-for="commentary in bibliographyCommentaries"
                                                    v-bind:key="commentary.commentary_id"
                                                >
                                                    <v-list-item-icon class="mr-4">
                                                        <v-icon>mdi-comment</v-icon>
                                                    </v-list-item-icon>
                                                    <v-list-item-content>
                                                        <v-list-item-title>
                                                            {{ commentary }}
                                                        </v-list-item-title>
                                                    </v-list-item-content>
                                                </v-list-item>
                                            </v-list>
                                            <div class="text-md-subtitle-1" v-else>No hay observaciones agregadas.</div>
                                        </v-card-text>
                                    </v-card>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col cols="12" align="right">
                                    <v-btn color="primary" :loading="loading" v-on:click="saveProtocolRevision">
                                        Finalizar evaluación
                                    </v-btn>
                                </v-col>
                            </v-row>
                        </v-container>
                    </v-stepper-content>
                    <v-stepper-content step="3">
                        <v-container>
                            <v-row>
                                <v-col col="12" align="center" v-if="thesisProtocolStatusId == 3">
                                    <v-icon size="80" class="primary--text">mdi-file-edit</v-icon>
                                    <div class="text-md-h4">¡Protocolo revisado!</div>
                                    <div class="text-md-h6">Espere a que el estudiante lo edite</div>
                                </v-col>
                                <v-col col="12" align="center" v-if="thesisProtocolStatusId == 4">
                                    <v-icon size="80" class="primary--text">mdi-file-edit</v-icon>
                                    <div class="text-md-h4">¡Protocolo aprobado!</div>
                                </v-col>
                                <v-col col="12" align="center" v-if="thesisProtocolStatusId == 5">
                                    <v-icon size="80" class="primary--text">mdi-file-edit</v-icon>
                                    <div class="text-md-h4">¡Protocolo rechazado!</div>
                                </v-col>
                            </v-row>
                        </v-container>
                    </v-stepper-content>
                </v-stepper>
            </v-col>
        </v-row>
    </v-container>
</template>
<script>
    export default {
        props: {
            thesisProtocol: {
                type: Object,
            },
        },

        mounted() {
            console.log(this.thesisProtocol)
        },

        computed: {
            titleCommentaries: function() {
                var titleCommentaries = []
                this.thesisProtocol.thesis_protocol_revisions.forEach(thesisProtocolRevision => {
                    if (thesisProtocolRevision.title_commentary) {
                        titleCommentaries.push(thesisProtocolRevision.title_commentary)
                    }
                })
                return titleCommentaries
            },
            institutionCommentaries: function() {
                var institutionCommentaries = []
                this.thesisProtocol.thesis_protocol_revisions.forEach(thesisProtocolRevision => {
                    if (thesisProtocolRevision.institution_commentary) {
                        institutionCommentaries.push(thesisProtocolRevision.institution_commentary)
                    }
                })
                return institutionCommentaries
            },
            scholarshipCommentaries: function() {
                var scholarshipCommentaries = []
                this.thesisProtocol.thesis_protocol_revisions.forEach(thesisProtocolRevision => {
                    if (thesisProtocolRevision.scholarship_commentary) {
                        scholarshipCommentaries.push(thesisProtocolRevision.scholarship_commentary)
                    }
                })
                return summaryCommentaries
            },
            assessorCommentaries: function() {
                var assessorCommentaries = []
                this.thesisProtocol.thesis_protocol_revisions.forEach(thesisProtocolRevision => {
                    if (thesisProtocolRevision.assessor_commentary) {
                        assessorCommentaries.push(thesisProtocolRevision.assessor_commentary)
                    }
                })
                return assessorCommentaries
            },
            secondAssessorCommentaries: function() {
                var secondAssessorCommentaries = []
                this.thesisProtocol.thesis_protocol_revisions.forEach(thesisProtocolRevision => {
                    if (thesisProtocolRevision.second_assessor_commentary) {
                        secondAssessorCommentaries.push(thesisProtocolRevision.second_assessor_commentary)
                    }
                })
                return secondAssessorCommentaries
            },
            summaryCommentaries: function() {
                var summaryCommentaries = []
                this.thesisProtocol.thesis_protocol_revisions.forEach(thesisProtocolRevision => {
                    if (thesisProtocolRevision.summary_commentary) {
                        summaryCommentaries.push(thesisProtocolRevision.summary_commentary)
                    }
                })
                return summaryCommentaries
            },
            antecedentCommentaries: function() {
                var antecedentCommentaries = []
                this.thesisProtocol.thesis_protocol_revisions.forEach(thesisProtocolRevision => {
                    if (thesisProtocolRevision.antecedent_commentary) {
                        antecedentCommentaries.push(thesisProtocolRevision.antecedent_commentary)
                    }
                })
                return antecedentCommentaries
            },
            generalObjectiveCommentaries: function() {
                var generalObjectiveCommentaries = []
                this.thesisProtocol.thesis_protocol_revisions.forEach(thesisProtocolRevision => {
                    if (thesisProtocolRevision.general_objective_commentary) {
                        generalObjectiveCommentaries.push(thesisProtocolRevision.general_objective_commentary)
                    }
                })
                return generalObjectiveCommentaries
            },
            methodologyCommentaries: function() {
                var methodologyCommentaries = []
                this.thesisProtocol.thesis_protocol_revisions.forEach(thesisProtocolRevision => {
                    if (thesisProtocolRevision.methodology_commentary) {
                        methodologyCommentaries.push(thesisProtocolRevision.methodology_commentary)
                    }
                })
                return methodologyCommentaries
            },
            scheduleCommentaries: function() {
                var scheduleCommentaries = []
                this.thesisProtocol.thesis_protocol_revisions.forEach(thesisProtocolRevision => {
                    if (thesisProtocolRevision.schedule_commentary) {
                        scheduleCommentaries.push(thesisProtocolRevision.schedule_commentary)
                    }
                })
                return scheduleCommentaries
            },
            infrastructureCommentaries: function() {
                var infrastructureCommentaries = []
                this.thesisProtocol.thesis_protocol_revisions.forEach(thesisProtocolRevision => {
                    if (thesisProtocolRevision.infrastructure_commentary) {
                        infrastructureCommentaries.push(thesisProtocolRevision.infrastructure_commentary)
                    }
                })
                return infrastructureCommentaries
            },
            artStateCommentaries: function() {
                var artStateCommentaries = []
                this.thesisProtocol.thesis_protocol_revisions.forEach(thesisProtocolRevision => {
                    if (thesisProtocolRevision.art_state_commentary) {
                        artStateCommentaries.push(thesisProtocolRevision.art_state_commentary)
                    }
                })
                return artStateCommentaries
            },
            expectedResultsCommentaries: function() {
                var expectedResultsCommentaries = []
                this.thesisProtocol.thesis_protocol_revisions.forEach(thesisProtocolRevision => {
                    if (thesisProtocolRevision.expected_results_commentary) {
                        expectedResultsCommentaries.push(thesisProtocolRevision.expected_results_commentary)
                    }
                })
                return expectedResultsCommentaries
            },
            socioeconomicImpactCommentaries: function() {
                var socioeconomicImpactCommentaries = []
                this.thesisProtocol.thesis_protocol_revisions.forEach(thesisProtocolRevision => {
                    if (thesisProtocolRevision.socioeconomic_impact_commentary) {
                        socioeconomicImpactCommentaries.push(thesisProtocolRevision.socioeconomic_impact_commentary)
                    }
                })
                return socioeconomicImpactCommentaries
            },
            contributionsCommentaries: function() {
                var contributionsCommentaries = []
                this.thesisProtocol.thesis_protocol_revisions.forEach(thesisProtocolRevision => {
                    if (thesisProtocolRevision.contributions_commentary) {
                        contributionsCommentaries.push(thesisProtocolRevision.contributions_commentary)
                    }
                })
                return contributionsCommentaries
            },
            bibliographyCommentaries: function() {
                var bibliographyCommentaries = []
                this.thesisProtocol.thesis_protocol_revisions.forEach(thesisProtocolRevision => {
                    if (thesisProtocolRevision.bibliography_commentary) {
                        bibliographyCommentaries.push(thesisProtocolRevision.bibliography_commentary)
                    }
                })
                return bibliographyCommentaries
            },
        },

        data() {
            return {
                thesisProtocolStatusId: 1,
                loading: false,
                thesisProtocolStepper: 2,

                titleStatus: '1',
                titleCommentary: '',
                institutionStatus: '1',
                institutionCommentary: '',
                scholarshipStatus: '1',
                scholarshipCommentary: '',
                assessorStatus: '1',
                assessorCommentary: '',
                secondAssessorStatus: '1',
                secondAssessorCommentary: '',
                summaryStatus: '1',
                summaryCommentary: '',
                antecedentStatus: '1',
                antecedentCommentary: '',
                generalObjectiveStatus: '1',
                generalObjectiveCommentary: '',
                methodologyStatus: '1',
                methodologyCommentary: '',
                scheduleStatus: '1',
                scheduleCommentary: '',
                infrastructureStatus: '1',
                infrastructureCommentary: '',
                artStateStatus: '1',
                artStateCommentary: '',
                expectedResultsStatus: '1',
                expectedResultsCommentary: '',
                socioeconomicImpactStatus: '1',
                socioeconomicImpactCommentary: '',
                contributionsStatus: '1',
                contributionsCommentary: '',
                bibliographyStatus: '1',
                bibliographyCommentary: '',
            }
        },

        methods: {
            saveProtocolRevision: function() {
                this.loading = true

                axios
                    .post('http://localhost:3000/thesis_protocol_revisions', {
                        thesis_protocol_student_id: this.thesisProtocol.thesis_protocol_student_id,
                        title_status_id: this.titleStatus,
                        title_commentary: this.titleCommentary,
                        institution_status_id: this.institutionStatus,
                        institution_commentary: this.institutionCommentary,
                        scholarship_status_id: this.scholarshipStatus,
                        scholarship_commentary: this.scholarshipCommentary,
                        assessor_status_id: this.assessorStatus,
                        assessor_commentary: this.assessorCommentary,
                        second_assessor_status_id: this.secondAssessorStatus,
                        second_assessor_commentary: this.secondAssessorCommentary,
                        summary_status_id: this.summaryStatus,
                        summary_commentary: this.summaryCommentary,
                        antecedent_status_id: this.antecedentStatus,
                        antecedent_commentary: this.antecedentCommentary,
                        general_objective_status_id: this.generalObjectiveStatus,
                        general_objective_commentary: this.generalObjectiveCommentary,
                        methodology_status_id: this.methodologyStatus,
                        methodology_commentary: this.methodologyCommentary,
                        schedule_status_id: this.scheduleStatus,
                        schedule_commentary: this.scheduleCommentary,
                        infrastructure_status_id: this.infrastructureStatus,
                        infrastructure_commentary: this.infrastructureCommentary,
                        art_state_status_id: this.artStateStatus,
                        art_state_commentary: this.artStateCommentary,
                        expected_results_status_id: this.expectedResultsStatus,
                        expected_results_commentary: this.expectedResultsCommentary,
                        socioeconomic_impact_status_id: this.socioeconomicImpactStatus,
                        socioeconomic_impact_commentary: this.socioeconomicImpactCommentary,
                        contributions_status_id: this.contributionsStatus,
                        contributions_commentary: this.contributionsCommentary,
                        bibliography_status_id: this.bibliographyStatus,
                        bibliography_commentary: this.bibliographyCommentary,
                    })
                    .then(response => {
                        this.thesisProtocolStatusId = response.data.thesis_protocol_status_id
                    })
                    .catch(function(error) {
                        console.log(error)
                    })
                this.thesisProtocolStepper++
            },
        },
    }
</script>
