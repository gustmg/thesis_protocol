<template>
    <v-container v-if="thesisProtocol">
        <v-row>
            <v-col cols="12">
                <v-btn v-on:click="setData()">Agregar datos</v-btn>
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
                            <v-form v-model="generalInfoForm">
                                <div class="text-h5 d-inline">
                                    Titulo del proyecto
                                </div>
                                <div v-if="thesisProtocol.thesis_protocol_status_id == 3" class="d-inline">
                                    <v-chip
                                        v-if="getThesisProtocolFieldStatus('title_status_id') == 1"
                                        class="success"
                                        label
                                    >
                                        <v-icon class="white--text" left>mdi-check</v-icon>
                                        Completo
                                    </v-chip>
                                    <v-chip
                                        v-else-if="getThesisProtocolFieldStatus('title_status_id') == 2"
                                        class="warning"
                                        label
                                    >
                                        <v-icon class="white--text" left>mdi-minus-circle-outline</v-icon>
                                        Regular
                                    </v-chip>
                                    <v-chip v-else class="error" label>
                                        <v-icon class="white--text" left>mdi-window-close</v-icon>
                                        Incompleto
                                    </v-chip>
                                </div>
                                <v-row>
                                    <v-col cols="12">
                                        <v-text-field
                                            v-model="thesisProtocol.thesis_protocol_title"
                                            :rules="textRules"
                                            placeholder="Ingrese el título de su tésis..."
                                            :readonly="getThesisProtocolFieldStatus('title_status_id') == 1"
                                            outlined
                                            required
                                            autofocus
                                        ></v-text-field>
                                    </v-col>
                                    <v-col
                                        v-if="thesisProtocol.thesis_protocol_status_id == 3"
                                        cols="12"
                                        class="pt-0 mb-12"
                                    >
                                        <v-card class="info">
                                            <v-card-text>
                                                <div class="text-md-subtitle-1 white--text">
                                                    Observación:
                                                    <i>{{ getThesisProtocolFieldCommentary('title_commentary') }}</i>
                                                </div>
                                            </v-card-text>
                                        </v-card>
                                    </v-col>
                                </v-row>
                                <div class="text-h5 d-inline">
                                    Institución de realización
                                </div>
                                <div v-if="thesisProtocol.thesis_protocol_status_id == 3" class="d-inline">
                                    <v-chip
                                        v-if="getThesisProtocolFieldStatus('institution_status_id') == 1"
                                        class="success"
                                        label
                                    >
                                        <v-icon class="white--text" left>mdi-check</v-icon>
                                        Completo
                                    </v-chip>
                                    <v-chip
                                        v-else-if="getThesisProtocolFieldStatus('institution_status_id') == 2"
                                        class="warning"
                                        label
                                    >
                                        <v-icon class="white--text" left>mdi-minus-circle-outline</v-icon>
                                        Regular
                                    </v-chip>
                                    <v-chip v-else class="error" label>
                                        <v-icon class="white--text" left>mdi-window-close</v-icon>
                                        Incompleto
                                    </v-chip>
                                </div>
                                <v-row>
                                    <v-col cols="6">
                                        <v-text-field
                                            v-model="thesisProtocol.thesis_protocol_institution_name"
                                            :rules="textRules"
                                            label="Nombre de la institución"
                                            outlined
                                            required
                                            :readonly="getThesisProtocolFieldStatus('institution_status_id') == 1"
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="6">
                                        <v-text-field
                                            v-model="thesisProtocol.thesis_protocol_institution_department"
                                            :rules="textRules"
                                            label="Departamento"
                                            outlined
                                            required
                                            :readonly="getThesisProtocolFieldStatus('institution_status_id') == 1"
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="9">
                                        <v-text-field
                                            v-model="thesisProtocol.thesis_protocol_institution_address"
                                            :rules="textRules"
                                            label="Dirección"
                                            outlined
                                            required
                                            :readonly="getThesisProtocolFieldStatus('institution_status_id') == 1"
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="3">
                                        <v-text-field
                                            v-model="thesisProtocol.thesis_protocol_institution_phone"
                                            :rules="textRules"
                                            label="Teléfono"
                                            outlined
                                            required
                                            :readonly="getThesisProtocolFieldStatus('institution_status_id') == 1"
                                        ></v-text-field>
                                    </v-col>
                                    <v-col
                                        v-if="thesisProtocol.thesis_protocol_status_id == 3"
                                        cols="12"
                                        class="pt-0 mb-12"
                                    >
                                        <v-card class="info">
                                            <v-card-text>
                                                <div class="text-md-subtitle-1 white--text">
                                                    Observación:
                                                    <i>{{
                                                        getThesisProtocolFieldCommentary('institution_commentary')
                                                    }}</i>
                                                </div>
                                            </v-card-text>
                                        </v-card>
                                    </v-col>
                                </v-row>
                                <div class="text-h5 d-inline">
                                    Beca de tésis (Opcional)
                                </div>
                                <div v-if="thesisProtocol.thesis_protocol_status_id == 3" class="d-inline">
                                    <v-chip
                                        v-if="getThesisProtocolFieldStatus('scholarship_status_id') == 1"
                                        class="success"
                                        label
                                    >
                                        <v-icon class="white--text" left>mdi-check</v-icon>
                                        Completo
                                    </v-chip>
                                    <v-chip
                                        v-else-if="getThesisProtocolFieldStatus('scholarship_status_id') == 2"
                                        class="warning"
                                        label
                                    >
                                        <v-icon class="white--text" left>mdi-minus-circle-outline</v-icon>
                                        Regular
                                    </v-chip>
                                    <v-chip v-else class="error" label>
                                        <v-icon class="white--text" left>mdi-window-close</v-icon>
                                        Incompleto
                                    </v-chip>
                                </div>
                                <v-row>
                                    <v-col cols="6">
                                        <v-text-field
                                            v-model="thesisProtocol.thesis_protocol_scholarship_institution"
                                            label="Institución que otorga la beca"
                                            outlined
                                            :readonly="getThesisProtocolFieldStatus('scholarship_status_id') == 1"
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="3">
                                        <v-text-field
                                            v-model="thesisProtocol.thesis_protocol_scholarship_type"
                                            label="Tipo de beca"
                                            outlined
                                            :readonly="getThesisProtocolFieldStatus('scholarship_status_id') == 1"
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="3">
                                        <v-text-field
                                            v-model="thesisProtocol.thesis_protocol_scholarship_vigency"
                                            label="Vigencia"
                                            outlined
                                            :readonly="getThesisProtocolFieldStatus('scholarship_status_id') == 1"
                                        ></v-text-field>
                                    </v-col>
                                    <v-col
                                        v-if="thesisProtocol.thesis_protocol_status_id == 3"
                                        cols="12"
                                        class="pt-0 mb-12"
                                    >
                                        <v-card class="info">
                                            <v-card-text>
                                                <div class="text-md-subtitle-1 white--text">
                                                    Observación:
                                                    <i>{{
                                                        getThesisProtocolFieldCommentary('scholarship_commentary')
                                                    }}</i>
                                                </div>
                                            </v-card-text>
                                        </v-card>
                                    </v-col>
                                </v-row>
                                <div class="text-h5 d-inline">
                                    Asesor principal
                                </div>
                                <div v-if="thesisProtocol.thesis_protocol_status_id == 3" class="d-inline">
                                    <v-chip
                                        v-if="getThesisProtocolFieldStatus('assessor_status_id') == 1"
                                        class="success"
                                        label
                                    >
                                        <v-icon class="white--text" left>mdi-check</v-icon>
                                        Completo
                                    </v-chip>
                                    <v-chip
                                        v-else-if="getThesisProtocolFieldStatus('assessor_status_id') == 2"
                                        class="warning"
                                        label
                                    >
                                        <v-icon class="white--text" left>mdi-minus-circle-outline</v-icon>
                                        Regular
                                    </v-chip>
                                    <v-chip v-else class="error" label>
                                        <v-icon class="white--text" left>mdi-window-close</v-icon>
                                        Incompleto
                                    </v-chip>
                                </div>
                                <v-row>
                                    <v-col cols="6">
                                        <v-text-field
                                            v-model="thesisProtocol.thesis_protocol_assessor_name"
                                            :rules="textRules"
                                            label="Nombre del asesor"
                                            outlined
                                            required
                                            :readonly="getThesisProtocolFieldStatus('assessor_status_id') == 1"
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="3">
                                        <v-text-field
                                            v-model="thesisProtocol.thesis_protocol_assessor_academic_degree"
                                            :rules="textRules"
                                            label="Grado académico del asesor"
                                            outlined
                                            required
                                            :readonly="getThesisProtocolFieldStatus('assessor_status_id') == 1"
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="3">
                                        <v-text-field
                                            v-model="thesisProtocol.thesis_protocol_assessor_phone"
                                            :rules="textRules"
                                            label="Teléfono particular"
                                            outlined
                                            required
                                            :readonly="getThesisProtocolFieldStatus('assessor_status_id') == 1"
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="6">
                                        <v-text-field
                                            v-model="thesisProtocol.thesis_protocol_assessor_institution"
                                            :rules="textRules"
                                            label="Institución"
                                            outlined
                                            required
                                            :readonly="getThesisProtocolFieldStatus('assessor_status_id') == 1"
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="6">
                                        <v-text-field
                                            v-model="thesisProtocol.thesis_protocol_assessor_adscription_department"
                                            :rules="textRules"
                                            label="Departamento de adscripción"
                                            outlined
                                            required
                                            :readonly="getThesisProtocolFieldStatus('assessor_status_id') == 1"
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="9">
                                        <v-text-field
                                            v-model="thesisProtocol.thesis_protocol_assessor_address"
                                            :rules="textRules"
                                            label="Dirección"
                                            outlined
                                            required
                                            :readonly="getThesisProtocolFieldStatus('assessor_status_id') == 1"
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="3">
                                        <v-text-field
                                            v-model="thesisProtocol.thesis_protocol_assessor_job_phone"
                                            :rules="textRules"
                                            label="Teléfono"
                                            outlined
                                            required
                                            :readonly="getThesisProtocolFieldStatus('assessor_status_id') == 1"
                                        ></v-text-field>
                                    </v-col>
                                    <v-col
                                        v-if="thesisProtocol.thesis_protocol_status_id == 3"
                                        cols="12"
                                        class="pt-0 mb-12"
                                    >
                                        <v-card class="info">
                                            <v-card-text>
                                                <div class="text-md-subtitle-1 white--text">
                                                    Observación:
                                                    <i>{{ getThesisProtocolFieldCommentary('assessor_commentary') }}</i>
                                                </div>
                                            </v-card-text>
                                        </v-card>
                                    </v-col>
                                </v-row>
                                <div class="text-h5 d-inline">
                                    Asesor secundario (Opcional)
                                </div>
                                <div v-if="thesisProtocol.thesis_protocol_status_id == 3" class="d-inline">
                                    <v-chip
                                        v-if="getThesisProtocolFieldStatus('second_assessor_status_id') == 1"
                                        class="success"
                                        label
                                    >
                                        <v-icon class="white--text" left>mdi-check</v-icon>
                                        Completo
                                    </v-chip>
                                    <v-chip
                                        v-else-if="getThesisProtocolFieldStatus('second_assessor_status_id') == 2"
                                        class="warning"
                                        label
                                    >
                                        <v-icon class="white--text" left>mdi-minus-circle-outline</v-icon>
                                        Regular
                                    </v-chip>
                                    <v-chip v-else class="error" label>
                                        <v-icon class="white--text" left>mdi-window-close</v-icon>
                                        Incompleto
                                    </v-chip>
                                </div>
                                <v-row>
                                    <v-col cols="6">
                                        <v-text-field
                                            v-model="thesisProtocol.thesis_protocol_second_assessor_name"
                                            label="Nombre del asesor"
                                            outlined
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="3">
                                        <v-text-field
                                            v-model="thesisProtocol.thesis_protocol_second_assessor_academic_degree"
                                            label="Grado académico del asesor"
                                            outlined
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="3">
                                        <v-text-field
                                            v-model="thesisProtocol.thesis_protocol_second_assessor_phone"
                                            label="Teléfono particular"
                                            outlined
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="6">
                                        <v-text-field
                                            v-model="thesisProtocol.thesis_protocol_second_assessor_institution"
                                            label="Institución"
                                            outlined
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="6">
                                        <v-text-field
                                            v-model="
                                                thesisProtocol.thesis_protocol_second_assessor_adscription_department
                                            "
                                            label="Departamento de adscripción"
                                            outlined
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="9">
                                        <v-text-field
                                            v-model="thesisProtocol.thesis_protocol_second_assessor_address"
                                            label="Dirección"
                                            outlined
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="3">
                                        <v-text-field
                                            v-model="thesisProtocol.thesis_protocol_second_assessor_job_phone"
                                            label="Teléfono"
                                            outlined
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="12">
                                        <v-textarea
                                            v-model="thesisProtocol.thesis_protocol_second_assessor_justification"
                                            rows="6"
                                            outlined
                                            no-resize
                                            label="Justificación"
                                        >
                                        </v-textarea>
                                    </v-col>
                                    <v-col
                                        v-if="thesisProtocol.thesis_protocol_status_id == 3"
                                        cols="12"
                                        class="pt-0 mb-12"
                                    >
                                        <v-card class="info">
                                            <v-card-text>
                                                <div class="text-md-subtitle-1 white--text">
                                                    Observación:
                                                    <i>{{
                                                        getThesisProtocolFieldCommentary('second_assessor_commentary')
                                                    }}</i>
                                                </div>
                                            </v-card-text>
                                        </v-card>
                                    </v-col>
                                </v-row>
                            </v-form>
                            <v-row>
                                <v-col cols="12" align="right" class="py-0">
                                    <v-btn
                                        color="primary"
                                        v-on:click="thesisProtocolStepper++"
                                        :disabled="!generalInfoForm"
                                    >
                                        Siguiente paso
                                    </v-btn>
                                </v-col>
                            </v-row>
                        </v-container>
                    </v-stepper-content>
                    <v-stepper-content step="2">
                        <v-container>
                            <v-form>
                                <div class="text-h5 d-inline">
                                    Resumen
                                </div>
                                <div v-if="thesisProtocol.thesis_protocol_status_id == 3" class="d-inline">
                                    <v-chip
                                        v-if="getThesisProtocolFieldStatus('summary_status_id') == 1"
                                        class="success"
                                        label
                                    >
                                        <v-icon class="white--text" left>mdi-check</v-icon>
                                        Completo
                                    </v-chip>
                                    <v-chip
                                        v-else-if="getThesisProtocolFieldStatus('summary_status_id') == 2"
                                        class="warning"
                                        label
                                    >
                                        <v-icon class="white--text" left>mdi-minus-circle-outline</v-icon>
                                        Regular
                                    </v-chip>
                                    <v-chip v-else class="error" label>
                                        <v-icon class="white--text" left>mdi-window-close</v-icon>
                                        Incompleto
                                    </v-chip>
                                </div>
                                <v-row>
                                    <v-col cols="12">
                                        <editor
                                            v-model="thesisProtocol.thesis_protocol_summary"
                                            api-key="4kz4f0znn7zm7z8oeui23ewyzj4elhcdrwv15nz02z0euzim"
                                            :init="{
                                                height: 500,
                                                menubar: false,
                                                plugins: [
                                                    'advlist autolink lists link image charmap print preview anchor',
                                                    'searchreplace visualblocks code fullscreen',
                                                    'insertdatetime media table paste code help wordcount',
                                                ],
                                                toolbar:
                                                    'undo redo | formatselect | bold italic backcolor | \
           alignleft aligncenter alignright alignjustify | \
           bullist numlist outdent indent | removeformat | help',
                                                init_instance_callback: function(editor) {
                                                    if (thesisProtocol.thesis_protocol_status_id == 3) {
                                                        editor.setContent(
                                                            thesisProtocol.thesis_protocol_summary.slice(1, -1)
                                                        )
                                                    }
                                                },
                                            }"
                                        />
                                    </v-col>
                                    <v-col
                                        v-if="thesisProtocol.thesis_protocol_status_id == 3"
                                        cols="12"
                                        class="pt-0 mb-12"
                                    >
                                        <v-card class="info">
                                            <v-card-text>
                                                <div class="text-md-subtitle-1 white--text">
                                                    Observación:
                                                    <i>{{ getThesisProtocolFieldCommentary('summary_commentary') }}</i>
                                                </div>
                                            </v-card-text>
                                        </v-card>
                                    </v-col>
                                </v-row>
                                <div class="text-h5 d-inline">
                                    Antecedentes del proyecto
                                </div>
                                <div v-if="thesisProtocol.thesis_protocol_status_id == 3" class="d-inline">
                                    <v-chip
                                        v-if="getThesisProtocolFieldStatus('antecedent_status_id') == 1"
                                        class="success"
                                        label
                                    >
                                        <v-icon class="white--text" left>mdi-check</v-icon>
                                        Completo
                                    </v-chip>
                                    <v-chip
                                        v-else-if="getThesisProtocolFieldStatus('antecedent_status_id') == 2"
                                        class="warning"
                                        label
                                    >
                                        <v-icon class="white--text" left>mdi-minus-circle-outline</v-icon>
                                        Regular
                                    </v-chip>
                                    <v-chip v-else class="error" label>
                                        <v-icon class="white--text" left>mdi-window-close</v-icon>
                                        Incompleto
                                    </v-chip>
                                </div>
                                <v-row>
                                    <v-col cols="12">
                                        <editor
                                            v-model="thesisProtocol.thesis_protocol_antecedent"
                                            api-key="4kz4f0znn7zm7z8oeui23ewyzj4elhcdrwv15nz02z0euzim"
                                            :init="{
                                                height: 500,
                                                menubar: false,
                                                plugins: [
                                                    'advlist autolink lists link image charmap print preview anchor',
                                                    'searchreplace visualblocks code fullscreen',
                                                    'insertdatetime media table paste code help wordcount',
                                                ],
                                                toolbar:
                                                    'undo redo | formatselect | bold italic backcolor | \
           alignleft aligncenter alignright alignjustify | \
           bullist numlist outdent indent | removeformat | help',
                                                init_instance_callback: function(editor) {
                                                    if (thesisProtocol.thesis_protocol_status_id == 3) {
                                                        editor.setContent(
                                                            thesisProtocol.thesis_protocol_antecedent.slice(1, -1)
                                                        )
                                                    }
                                                },
                                            }"
                                        />
                                    </v-col>
                                    <v-col
                                        v-if="thesisProtocol.thesis_protocol_status_id == 3"
                                        cols="12"
                                        class="pt-0 mb-12"
                                    >
                                        <v-card class="info">
                                            <v-card-text>
                                                <div class="text-md-subtitle-1 white--text">
                                                    Observación:
                                                    <i>{{
                                                        getThesisProtocolFieldCommentary('antecedent_commentary')
                                                    }}</i>
                                                </div>
                                            </v-card-text>
                                        </v-card>
                                    </v-col>
                                </v-row>
                                <div class="text-h5 d-inline">
                                    Objetivos generales y específicos del proyecto
                                </div>
                                <div v-if="thesisProtocol.thesis_protocol_status_id == 3" class="d-inline">
                                    <v-chip
                                        v-if="getThesisProtocolFieldStatus('general_objective_status_id') == 1"
                                        class="success"
                                        label
                                    >
                                        <v-icon class="white--text" left>mdi-check</v-icon>
                                        Completo
                                    </v-chip>
                                    <v-chip
                                        v-else-if="getThesisProtocolFieldStatus('general_objective_status_id') == 2"
                                        class="warning"
                                        label
                                    >
                                        <v-icon class="white--text" left>mdi-minus-circle-outline</v-icon>
                                        Regular
                                    </v-chip>
                                    <v-chip v-else class="error" label>
                                        <v-icon class="white--text" left>mdi-window-close</v-icon>
                                        Incompleto
                                    </v-chip>
                                </div>
                                <v-row>
                                    <v-col cols="12">
                                        <editor
                                            v-model="thesisProtocol.thesis_protocol_general_objective"
                                            api-key="4kz4f0znn7zm7z8oeui23ewyzj4elhcdrwv15nz02z0euzim"
                                            :init="{
                                                height: 500,
                                                menubar: false,
                                                plugins: [
                                                    'advlist autolink lists link image charmap print preview anchor',
                                                    'searchreplace visualblocks code fullscreen',
                                                    'insertdatetime media table paste code help wordcount',
                                                ],
                                                toolbar:
                                                    'undo redo | formatselect | bold italic backcolor | \
           alignleft aligncenter alignright alignjustify | \
           bullist numlist outdent indent | removeformat | help',
                                                init_instance_callback: function(editor) {
                                                    if (thesisProtocol.thesis_protocol_status_id == 3) {
                                                        editor.setContent(
                                                            thesisProtocol.thesis_protocol_general_objective.slice(
                                                                1,
                                                                -1
                                                            )
                                                        )
                                                    }
                                                },
                                            }"
                                        />
                                    </v-col>
                                    <v-col
                                        v-if="thesisProtocol.thesis_protocol_status_id == 3"
                                        cols="12"
                                        class="pt-0 mb-12"
                                    >
                                        <v-card class="info">
                                            <v-card-text>
                                                <div class="text-md-subtitle-1 white--text">
                                                    Observación:
                                                    <i>{{
                                                        getThesisProtocolFieldCommentary('general_objective_commentary')
                                                    }}</i>
                                                </div>
                                            </v-card-text>
                                        </v-card>
                                    </v-col>
                                </v-row>
                                <div class="text-h5 d-inline">
                                    Metodología
                                </div>
                                <div v-if="thesisProtocol.thesis_protocol_status_id == 3" class="d-inline">
                                    <v-chip
                                        v-if="getThesisProtocolFieldStatus('methodology_status_id') == 1"
                                        class="success"
                                        label
                                    >
                                        <v-icon class="white--text" left>mdi-check</v-icon>
                                        Completo
                                    </v-chip>
                                    <v-chip
                                        v-else-if="getThesisProtocolFieldStatus('methodology_status_id') == 2"
                                        class="warning"
                                        label
                                    >
                                        <v-icon class="white--text" left>mdi-minus-circle-outline</v-icon>
                                        Regular
                                    </v-chip>
                                    <v-chip v-else class="error" label>
                                        <v-icon class="white--text" left>mdi-window-close</v-icon>
                                        Incompleto
                                    </v-chip>
                                </div>
                                <v-row>
                                    <v-col cols="12">
                                        <editor
                                            v-model="thesisProtocol.thesis_protocol_methodology"
                                            api-key="4kz4f0znn7zm7z8oeui23ewyzj4elhcdrwv15nz02z0euzim"
                                            :init="{
                                                height: 500,
                                                menubar: false,
                                                plugins: [
                                                    'advlist autolink lists link image charmap print preview anchor',
                                                    'searchreplace visualblocks code fullscreen',
                                                    'insertdatetime media table paste code help wordcount',
                                                ],
                                                toolbar:
                                                    'undo redo | formatselect | bold italic backcolor | \
           alignleft aligncenter alignright alignjustify | \
           bullist numlist outdent indent | removeformat | help',
                                                init_instance_callback: function(editor) {
                                                    if (thesisProtocol.thesis_protocol_status_id == 3) {
                                                        editor.setContent(
                                                            thesisProtocol.thesis_protocol_methodology.slice(1, -1)
                                                        )
                                                    }
                                                },
                                            }"
                                        />
                                    </v-col>
                                    <v-col
                                        v-if="thesisProtocol.thesis_protocol_status_id == 3"
                                        cols="12"
                                        class="pt-0 mb-12"
                                    >
                                        <v-card class="info">
                                            <v-card-text>
                                                <div class="text-md-subtitle-1 white--text">
                                                    Observación:
                                                    <i>{{
                                                        getThesisProtocolFieldCommentary('methodology_commentary')
                                                    }}</i>
                                                </div>
                                            </v-card-text>
                                        </v-card>
                                    </v-col>
                                </v-row>
                                <div class="text-h5 d-inline">
                                    Cronograma de actividades
                                </div>
                                <div v-if="thesisProtocol.thesis_protocol_status_id == 3" class="d-inline">
                                    <v-chip
                                        v-if="getThesisProtocolFieldStatus('schedule_status_id') == 1"
                                        class="success"
                                        label
                                    >
                                        <v-icon class="white--text" left>mdi-check</v-icon>
                                        Completo
                                    </v-chip>
                                    <v-chip
                                        v-else-if="getThesisProtocolFieldStatus('schedule_status_id') == 2"
                                        class="warning"
                                        label
                                    >
                                        <v-icon class="white--text" left>mdi-minus-circle-outline</v-icon>
                                        Regular
                                    </v-chip>
                                    <v-chip v-else class="error" label>
                                        <v-icon class="white--text" left>mdi-window-close</v-icon>
                                        Incompleto
                                    </v-chip>
                                </div>
                                <v-row>
                                    <v-col cols="12">
                                        <editor
                                            v-model="thesisProtocol.thesis_protocol_schedule"
                                            api-key="4kz4f0znn7zm7z8oeui23ewyzj4elhcdrwv15nz02z0euzim"
                                            :init="{
                                                height: 500,
                                                menubar: false,
                                                plugins: [
                                                    'advlist autolink lists link image charmap print preview anchor',
                                                    'searchreplace visualblocks code fullscreen',
                                                    'insertdatetime media table paste code help wordcount',
                                                ],
                                                toolbar:
                                                    'undo redo | formatselect | bold italic backcolor | \
           alignleft aligncenter alignright alignjustify | \
           bullist numlist outdent indent | removeformat | help',
                                                init_instance_callback: function(editor) {
                                                    if (thesisProtocol.thesis_protocol_status_id == 3) {
                                                        editor.setContent(
                                                            thesisProtocol.thesis_protocol_schedule.slice(1, -1)
                                                        )
                                                    }
                                                },
                                            }"
                                        />
                                    </v-col>
                                    <v-col
                                        v-if="thesisProtocol.thesis_protocol_status_id == 3"
                                        cols="12"
                                        class="pt-0 mb-12"
                                    >
                                        <v-card class="info">
                                            <v-card-text>
                                                <div class="text-md-subtitle-1 white--text">
                                                    Observación:
                                                    <i>{{ getThesisProtocolFieldCommentary('schedule_commentary') }}</i>
                                                </div>
                                            </v-card-text>
                                        </v-card>
                                    </v-col>
                                </v-row>
                                <div class="text-h5 d-inline">
                                    Infraestructura
                                </div>
                                <div v-if="thesisProtocol.thesis_protocol_status_id == 3" class="d-inline">
                                    <v-chip
                                        v-if="getThesisProtocolFieldStatus('infrastructure_status_id') == 1"
                                        class="success"
                                        label
                                    >
                                        <v-icon class="white--text" left>mdi-check</v-icon>
                                        Completo
                                    </v-chip>
                                    <v-chip
                                        v-else-if="getThesisProtocolFieldStatus('infrastructure_status_id') == 2"
                                        class="warning"
                                        label
                                    >
                                        <v-icon class="white--text" left>mdi-minus-circle-outline</v-icon>
                                        Regular
                                    </v-chip>
                                    <v-chip v-else class="error" label>
                                        <v-icon class="white--text" left>mdi-window-close</v-icon>
                                        Incompleto
                                    </v-chip>
                                </div>
                                <v-row>
                                    <v-col cols="12">
                                        <editor
                                            v-model="thesisProtocol.thesis_protocol_infrastructure"
                                            api-key="4kz4f0znn7zm7z8oeui23ewyzj4elhcdrwv15nz02z0euzim"
                                            :init="{
                                                height: 500,
                                                menubar: false,
                                                plugins: [
                                                    'advlist autolink lists link image charmap print preview anchor',
                                                    'searchreplace visualblocks code fullscreen',
                                                    'insertdatetime media table paste code help wordcount',
                                                ],
                                                toolbar:
                                                    'undo redo | formatselect | bold italic backcolor | \
           alignleft aligncenter alignright alignjustify | \
           bullist numlist outdent indent | removeformat | help',
                                                init_instance_callback: function(editor) {
                                                    if (thesisProtocol.thesis_protocol_status_id == 3) {
                                                        editor.setContent(
                                                            thesisProtocol.thesis_protocol_infrastructure.slice(1, -1)
                                                        )
                                                    }
                                                },
                                            }"
                                        />
                                    </v-col>
                                    <v-col
                                        v-if="thesisProtocol.thesis_protocol_status_id == 3"
                                        cols="12"
                                        class="pt-0 mb-12"
                                    >
                                        <v-card class="info">
                                            <v-card-text>
                                                <div class="text-md-subtitle-1 white--text">
                                                    Observación:
                                                    <i>{{
                                                        getThesisProtocolFieldCommentary('infrastructure_commentary')
                                                    }}</i>
                                                </div>
                                            </v-card-text>
                                        </v-card>
                                    </v-col>
                                </v-row>
                                <div class="text-h5 d-inline">
                                    Estado del campo del arte
                                </div>
                                <div v-if="thesisProtocol.thesis_protocol_status_id == 3" class="d-inline">
                                    <v-chip
                                        v-if="getThesisProtocolFieldStatus('art_state_status_id') == 1"
                                        class="success"
                                        label
                                    >
                                        <v-icon class="white--text" left>mdi-check</v-icon>
                                        Completo
                                    </v-chip>
                                    <v-chip
                                        v-else-if="getThesisProtocolFieldStatus('art_state_status_id') == 2"
                                        class="warning"
                                        label
                                    >
                                        <v-icon class="white--text" left>mdi-minus-circle-outline</v-icon>
                                        Regular
                                    </v-chip>
                                    <v-chip v-else class="error" label>
                                        <v-icon class="white--text" left>mdi-window-close</v-icon>
                                        Incompleto
                                    </v-chip>
                                </div>
                                <v-row>
                                    <v-col cols="12">
                                        <editor
                                            v-model="thesisProtocol.thesis_protocol_art_state"
                                            api-key="4kz4f0znn7zm7z8oeui23ewyzj4elhcdrwv15nz02z0euzim"
                                            :init="{
                                                height: 500,
                                                menubar: false,
                                                plugins: [
                                                    'advlist autolink lists link image charmap print preview anchor',
                                                    'searchreplace visualblocks code fullscreen',
                                                    'insertdatetime media table paste code help wordcount',
                                                ],
                                                toolbar:
                                                    'undo redo | formatselect | bold italic backcolor | \
           alignleft aligncenter alignright alignjustify | \
           bullist numlist outdent indent | removeformat | help',
                                                init_instance_callback: function(editor) {
                                                    if (thesisProtocol.thesis_protocol_status_id == 3) {
                                                        editor.setContent(
                                                            thesisProtocol.thesis_protocol_art_state.slice(1, -1)
                                                        )
                                                    }
                                                },
                                            }"
                                        />
                                    </v-col>
                                    <v-col
                                        v-if="thesisProtocol.thesis_protocol_status_id == 3"
                                        cols="12"
                                        class="pt-0 mb-12"
                                    >
                                        <v-card class="info">
                                            <v-card-text>
                                                <div class="text-md-subtitle-1 white--text">
                                                    Observación:
                                                    <i>{{
                                                        getThesisProtocolFieldCommentary('art_state_commentary')
                                                    }}</i>
                                                </div>
                                            </v-card-text>
                                        </v-card>
                                    </v-col>
                                </v-row>
                                <div class="text-h5 d-inline">
                                    Resultados esperados
                                </div>
                                <div v-if="thesisProtocol.thesis_protocol_status_id == 3" class="d-inline">
                                    <v-chip
                                        v-if="getThesisProtocolFieldStatus('expected_results_status_id') == 1"
                                        class="success"
                                        label
                                    >
                                        <v-icon class="white--text" left>mdi-check</v-icon>
                                        Completo
                                    </v-chip>
                                    <v-chip
                                        v-else-if="getThesisProtocolFieldStatus('expected_results_status_id') == 2"
                                        class="warning"
                                        label
                                    >
                                        <v-icon class="white--text" left>mdi-minus-circle-outline</v-icon>
                                        Regular
                                    </v-chip>
                                    <v-chip v-else class="error" label>
                                        <v-icon class="white--text" left>mdi-window-close</v-icon>
                                        Incompleto
                                    </v-chip>
                                </div>
                                <v-row>
                                    <v-col cols="12">
                                        <editor
                                            v-model="thesisProtocol.thesis_protocol_expected_results"
                                            api-key="4kz4f0znn7zm7z8oeui23ewyzj4elhcdrwv15nz02z0euzim"
                                            :init="{
                                                height: 500,
                                                menubar: false,
                                                plugins: [
                                                    'advlist autolink lists link image charmap print preview anchor',
                                                    'searchreplace visualblocks code fullscreen',
                                                    'insertdatetime media table paste code help wordcount',
                                                ],
                                                toolbar:
                                                    'undo redo | formatselect | bold italic backcolor | \
           alignleft aligncenter alignright alignjustify | \
           bullist numlist outdent indent | removeformat | help',
                                                init_instance_callback: function(editor) {
                                                    if (thesisProtocol.thesis_protocol_status_id == 3) {
                                                        editor.setContent(
                                                            thesisProtocol.thesis_protocol_expected_results.slice(1, -1)
                                                        )
                                                    }
                                                },
                                            }"
                                        />
                                    </v-col>
                                    <v-col
                                        v-if="thesisProtocol.thesis_protocol_status_id == 3"
                                        cols="12"
                                        class="pt-0 mb-12"
                                    >
                                        <v-card class="info">
                                            <v-card-text>
                                                <div class="text-md-subtitle-1 white--text">
                                                    Observación:
                                                    <i>{{
                                                        getThesisProtocolFieldCommentary('expected_results_commentary')
                                                    }}</i>
                                                </div>
                                            </v-card-text>
                                        </v-card>
                                    </v-col>
                                </v-row>
                                <div class="text-h5 d-inline">
                                    Impacto socioeconómico
                                </div>
                                <div v-if="thesisProtocol.thesis_protocol_status_id == 3" class="d-inline">
                                    <v-chip
                                        v-if="getThesisProtocolFieldStatus('socioeconomic_impact_status_id') == 1"
                                        class="success"
                                        label
                                    >
                                        <v-icon class="white--text" left>mdi-check</v-icon>
                                        Completo
                                    </v-chip>
                                    <v-chip v-else-if="getThesisProtocolFieldStatus == 2" class="warning" label>
                                        <v-icon class="white--text" left>mdi-minus-circle-outline</v-icon>
                                        Regular
                                    </v-chip>
                                    <v-chip v-else class="error" label>
                                        <v-icon class="white--text" left>mdi-window-close</v-icon>
                                        Incompleto
                                    </v-chip>
                                </div>
                                <v-row>
                                    <v-col cols="12">
                                        <editor
                                            v-model="thesisProtocol.thesis_protocol_socioeconomic_impact"
                                            api-key="4kz4f0znn7zm7z8oeui23ewyzj4elhcdrwv15nz02z0euzim"
                                            :init="{
                                                height: 500,
                                                menubar: false,
                                                plugins: [
                                                    'advlist autolink lists link image charmap print preview anchor',
                                                    'searchreplace visualblocks code fullscreen',
                                                    'insertdatetime media table paste code help wordcount',
                                                ],
                                                toolbar:
                                                    'undo redo | formatselect | bold italic backcolor | \
           alignleft aligncenter alignright alignjustify | \
           bullist numlist outdent indent | removeformat | help',
                                                init_instance_callback: function(editor) {
                                                    if (thesisProtocol.thesis_protocol_status_id == 3) {
                                                        editor.setContent(
                                                            thesisProtocol.thesis_protocol_socioeconomic_impact.slice(
                                                                1,
                                                                -1
                                                            )
                                                        )
                                                    }
                                                },
                                            }"
                                        />
                                    </v-col>
                                    <v-col
                                        v-if="thesisProtocol.thesis_protocol_status_id == 3"
                                        cols="12"
                                        class="pt-0 mb-12"
                                    >
                                        <v-card class="info">
                                            <v-card-text>
                                                <div class="text-md-subtitle-1 white--text">
                                                    Observación:
                                                    <i>{{
                                                        getThesisProtocolFieldCommentary(
                                                            'socioeconomic_impact_commentary'
                                                        )
                                                    }}</i>
                                                </div>
                                            </v-card-text>
                                        </v-card>
                                    </v-col>
                                </v-row>
                                <div class="text-h5 d-inline">
                                    Aportaciones
                                </div>
                                <div v-if="thesisProtocol.thesis_protocol_status_id == 3" class="d-inline">
                                    <v-chip
                                        v-if="getThesisProtocolFieldStatus('contributions_status_id') == 1"
                                        class="success"
                                        label
                                    >
                                        <v-icon class="white--text" left>mdi-check</v-icon>
                                        Completo
                                    </v-chip>
                                    <v-chip v-else-if="getThesisProtocolFieldStatus == 2" class="warning" label>
                                        <v-icon class="white--text" left>mdi-minus-circle-outline</v-icon>
                                        Regular
                                    </v-chip>
                                    <v-chip v-else class="error" label>
                                        <v-icon class="white--text" left>mdi-window-close</v-icon>
                                        Incompleto
                                    </v-chip>
                                </div>
                                <v-row>
                                    <v-col cols="12">
                                        <editor
                                            v-model="thesisProtocol.thesis_protocol_contributions"
                                            api-key="4kz4f0znn7zm7z8oeui23ewyzj4elhcdrwv15nz02z0euzim"
                                            :init="{
                                                height: 500,
                                                menubar: false,
                                                plugins: [
                                                    'advlist autolink lists link image charmap print preview anchor',
                                                    'searchreplace visualblocks code fullscreen',
                                                    'insertdatetime media table paste code help wordcount',
                                                ],
                                                toolbar:
                                                    'undo redo | formatselect | bold italic backcolor | \
           alignleft aligncenter alignright alignjustify | \
           bullist numlist outdent indent | removeformat | help',
                                                init_instance_callback: function(editor) {
                                                    if (thesisProtocol.thesis_protocol_status_id == 3) {
                                                        editor.setContent(
                                                            thesisProtocol.thesis_protocol_contributions.slice(1, -1)
                                                        )
                                                    }
                                                },
                                            }"
                                        />
                                    </v-col>
                                    <v-col
                                        v-if="thesisProtocol.thesis_protocol_status_id == 3"
                                        cols="12"
                                        class="pt-0 mb-12"
                                    >
                                        <v-card class="info">
                                            <v-card-text>
                                                <div class="text-md-subtitle-1 white--text">
                                                    Observación:
                                                    <i>{{
                                                        getThesisProtocolFieldCommentary('contributions_commentary')
                                                    }}</i>
                                                </div>
                                            </v-card-text>
                                        </v-card>
                                    </v-col>
                                </v-row>
                                <div class="text-h5 d-inline">
                                    Bibliografía
                                </div>
                                <div v-if="thesisProtocol.thesis_protocol_status_id == 3" class="d-inline">
                                    <v-chip
                                        v-if="getThesisProtocolFieldStatus('bibliography_status_id') == 1"
                                        class="success"
                                        label
                                    >
                                        <v-icon class="white--text" left>mdi-check</v-icon>
                                        Completo
                                    </v-chip>
                                    <v-chip v-else-if="getThesisProtocolFieldStatus == 2" class="warning" label>
                                        <v-icon class="white--text" left>mdi-minus-circle-outline</v-icon>
                                        Regular
                                    </v-chip>
                                    <v-chip v-else class="error" label>
                                        <v-icon class="white--text" left>mdi-window-close</v-icon>
                                        Incompleto
                                    </v-chip>
                                </div>
                                <v-row>
                                    <v-col cols="12">
                                        <editor
                                            v-model="thesisProtocol.thesis_protocol_bibliography"
                                            api-key="4kz4f0znn7zm7z8oeui23ewyzj4elhcdrwv15nz02z0euzim"
                                            :init="{
                                                height: 500,
                                                menubar: false,
                                                plugins: [
                                                    'advlist autolink lists link image charmap print preview anchor',
                                                    'searchreplace visualblocks code fullscreen',
                                                    'insertdatetime media table paste code help wordcount',
                                                ],
                                                toolbar:
                                                    'undo redo | formatselect | bold italic backcolor | \
           alignleft aligncenter alignright alignjustify | \
           bullist numlist outdent indent | removeformat | help',
                                                init_instance_callback: function(editor) {
                                                    if (thesisProtocol.thesis_protocol_status_id == 3) {
                                                        editor.setContent(
                                                            thesisProtocol.thesis_protocol_bibliography.slice(1, -1)
                                                        )
                                                    }
                                                },
                                            }"
                                        />
                                    </v-col>
                                    <v-col
                                        v-if="thesisProtocol.thesis_protocol_status_id == 3"
                                        cols="12"
                                        class="pt-0 mb-12"
                                    >
                                        <v-card class="info">
                                            <v-card-text>
                                                <div class="text-md-subtitle-1 white--text">
                                                    Observación:
                                                    <i>{{
                                                        getThesisProtocolFieldCommentary('bibliography_commentary')
                                                    }}</i>
                                                </div>
                                            </v-card-text>
                                        </v-card>
                                    </v-col>
                                </v-row>
                            </v-form>
                            <v-row>
                                <v-col cols="12" align="right" class="py-0">
                                    <v-btn
                                        color="primary"
                                        :loading="loading"
                                        v-on:click="saveProtocol"
                                        :disabled="!validProyectDescriptionForm"
                                    >
                                        Subir protocolo
                                    </v-btn>
                                </v-col>
                            </v-row>
                        </v-container>
                    </v-stepper-content>
                    <v-stepper-content step="3">
                        <v-container>
                            <v-row>
                                <v-col
                                    col="12"
                                    align="center"
                                    v-if="
                                        thesisProtocol.thesis_protocol_status_id == 1 ||
                                            thesisProtocol.thesis_protocol_status_id == 2 ||
                                            thesisProtocol.thesis_protocol_status_id == 3
                                    "
                                >
                                    <v-icon size="80" class="primary--text">mdi-file-edit</v-icon>
                                    <div class="text-md-h4">¡Protocolo en revisión!</div>
                                    <div class="text-md-h6">
                                        Uno de los evaluadores se encargará de revisarlo.
                                    </div>
                                </v-col>
                                <v-col
                                    col="12"
                                    align="center"
                                    v-else-if="thesisProtocol.thesis_protocol_status_id == 4"
                                >
                                    <v-icon size="80" class="primary--text">mdi-check-outline</v-icon>
                                    <div class="text-md-h4">¡Protocolo aprobado!</div>
                                    <div class="text-md-h6">
                                        Tu protocolo ha sido aprobado.
                                    </div>
                                </v-col>
                                <v-col
                                    col="12"
                                    align="center"
                                    v-else-if="thesisProtocol.thesis_protocol_status_id == 5"
                                >
                                    <v-icon size="80" class="primary--text">mdi-emoticon-sad-outline</v-icon>
                                    <div class="text-md-h4">Lo sentimos</div>
                                    <div class="text-md-h6">
                                        Tu protocolo ha sido rechazado.
                                    </div>
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
    import Editor from '@tinymce/tinymce-vue'
    export default {
        components: {
            editor: Editor,
        },

        props: {
            studentId: {
                type: Number,
            },
        },

        async mounted() {
            await axios
                .get('thesis_protocols/' + this.studentId)
                .then(response => {
                    this.thesisProtocol = response.data.thesis_protocol
                })
                .catch(error => console.log(error))

            if (
                this.thesisProtocol.thesis_protocol_status_id == 1 ||
                this.thesisProtocol.thesis_protocol_status_id == 3
            ) {
                this.thesisProtocolStepper = 1
            } else {
                this.thesisProtocolStepper = 3
            }
        },

        computed: {
            validProyectDescriptionForm: function() {
                if (
                    this.proyectSummary == '' ||
                    this.proyectAntecedent == '' ||
                    this.proyectGeneralObjective == '' ||
                    this.proyectMethodology == '' ||
                    this.proyectSchedule == '' ||
                    this.proyectInfrastructure == '' ||
                    this.proyectArtState == '' ||
                    this.proyectExpectedResults == '' ||
                    this.proyectSocioeconomicImpact == '' ||
                    this.proyectContributions == '' ||
                    this.proyectBibliography == ''
                ) {
                    return false
                } else {
                    return true
                }
            },
        },

        data() {
            return {
                thesisProtocol: null,
                thesisProtocolStepper: 1,
                loading: false,
                generalInfoForm: false,
                textRules: [v => !!v || this.requiredFieldErrorMessage],
                requiredFieldErrorMessage: 'Este campo es requerido.',
            }
        },

        methods: {
            saveProtocol: function() {
                this.loading = true

                axios
                    .put('/thesis_protocols/' + this.thesisProtocol.thesis_protocol_student_id, {
                        thesis_protocol_title: this.thesisProtocol.thesis_protocol_title,
                        thesis_protocol_institution_name: this.thesisProtocol.thesis_protocol_institution_name,
                        thesis_protocol_institution_department: this.thesisProtocol
                            .thesis_protocol_institution_department,
                        thesis_protocol_institution_address: this.thesisProtocol.thesis_protocol_institution_address,
                        thesis_protocol_institution_phone: this.thesisProtocol.thesis_protocol_institution_phone,
                        thesis_protocol_scholarship_institution: this.thesisProtocol
                            .thesis_protocol_scholarship_institution,
                        thesis_protocol_scholarship_type: this.thesisProtocol.thesis_protocol_scholarship_type,
                        thesis_protocol_scholarship_vigency: this.thesisProtocol.thesis_protocol_scholarship_vigency,
                        thesis_protocol_assessor_name: this.thesisProtocol.thesis_protocol_assessor_name,
                        thesis_protocol_assessor_academic_degree: this.thesisProtocol
                            .thesis_protocol_assessor_academic_degree,
                        thesis_protocol_assessor_phone: this.thesisProtocol.thesis_protocol_assessor_phone,
                        thesis_protocol_assessor_institution: this.thesisProtocol.thesis_protocol_assessor_institution,
                        thesis_protocol_assessor_adscription_department: this.thesisProtocol
                            .thesis_protocol_assessor_adscription_department,
                        thesis_protocol_assessor_address: this.thesisProtocol.thesis_protocol_assessor_address,
                        thesis_protocol_assessor_job_phone: this.thesisProtocol.thesis_protocol_assessor_job_phone,
                        thesis_protocol_second_assessor_name: this.thesisProtocol.thesis_protocol_second_assessor_name,
                        thesis_protocol_second_assessor_academic_degree: this.thesisProtocol
                            .thesis_protocol_second_assessor_academic_degree,
                        thesis_protocol_second_assessor_phone: this.thesisProtocol
                            .thesis_protocol_second_assessor_phone,
                        thesis_protocol_second_assessor_institution: this.thesisProtocol
                            .thesis_protocol_second_assessor_institution,
                        thesis_protocol_second_assessor_adscription_department: this.thesisProtocol
                            .thesis_protocol_second_assessor_adscription_department,
                        thesis_protocol_second_assessor_address: this.thesisProtocol
                            .thesis_protocol_second_assessor_address,
                        thesis_protocol_second_assessor_job_phone: this.thesisProtocol
                            .thesis_protocol_second_assessor_job_phone,
                        thesis_protocol_second_assessor_justification: this.thesisProtocol
                            .thesis_protocol_second_assessor_justification,

                        thesis_protocol_summary: this.thesisProtocol.thesis_protocol_summary,
                        thesis_protocol_antecedent: this.thesisProtocol.thesis_protocol_antecedent,
                        thesis_protocol_general_objective: this.thesisProtocol.thesis_protocol_general_objective,
                        thesis_protocol_methodology: this.thesisProtocol.thesis_protocol_methodology,
                        thesis_protocol_schedule: this.thesisProtocol.thesis_protocol_schedule,
                        thesis_protocol_infrastructure: this.thesisProtocol.thesis_protocol_infrastructure,
                        thesis_protocol_art_state: this.thesisProtocol.thesis_protocol_art_state,
                        thesis_protocol_expected_results: this.thesisProtocol.thesis_protocol_expected_results,
                        thesis_protocol_socioeconomic_impact: this.thesisProtocol.thesis_protocol_socioeconomic_impact,
                        thesis_protocol_contributions: this.thesisProtocol.thesis_protocol_contributions,
                        thesis_protocol_bibliography: this.thesisProtocol.thesis_protocol_bibliography,
                        thesis_protocol_status_id: 2,
                    })
                    .then(response => {
                        this.thesisProtocolStepper++
                    })
                    .catch(function(error) {
                        console.log(error)
                    })
            },

            getThesisProtocolFieldStatus: function(field) {
                if (this.thesisProtocol.thesis_protocol_revisions.length != 0) {
                    return this.thesisProtocol.thesis_protocol_revisions[
                        this.thesisProtocol.thesis_protocol_revisions.length - 1
                    ][field]
                }
            },

            getThesisProtocolFieldCommentary: function(field) {
                if (this.thesisProtocol.thesis_protocol_revisions.length != 0) {
                    var commentary = this.thesisProtocol.thesis_protocol_revisions[
                        this.thesisProtocol.thesis_protocol_revisions.length - 1
                    ][field]
                    if (commentary) {
                        return commentary
                    } else {
                        return 'Ninguna'
                    }
                }
            },

            setData: function() {
                this.thesisProtocol.thesis_protocol_title =
                    'Aplicación Colaborativa para Gestionar la Evaluación de la Titulación por Experiencia Profesional'
                this.thesisProtocol.thesis_protocol_institution_name = 'Benemérita Universidad Autónoma de Puebla.'
                this.thesisProtocol.thesis_protocol_institution_department =
                    'Facultad de Ciencias de la Computación BUAP'
                this.thesisProtocol.thesis_protocol_institution_address =
                    'Avenida San Claudio, Blvrd 14 Sur, Cdad. Universitaria, 72592 Puebla, Pue.'
                this.thesisProtocol.thesis_protocol_institution_phone = '01 222 229 5500 ext. 7204'
                // this.thesisProtocol.thesis_protocol_scholarship_institution = ''
                // this.thesisProtocol.thesis_protocol_scholarship_type = ''
                // this.thesisProtocol.thesis_protocol_scholarship_vigency = ''
                this.thesisProtocol.thesis_protocol_assessor_name = 'Maria Luz Adolfina  Sánchea Gálvez'
                this.thesisProtocol.thesis_protocol_assessor_academic_degree = 'Doctorado'
                this.thesisProtocol.thesis_protocol_assessor_phone = '222-244-6117'
                this.thesisProtocol.thesis_protocol_assessor_institution = 'Benemérita Universidad Autónoma de Puebla '
                this.thesisProtocol.thesis_protocol_assessor_adscription_department =
                    'Facultad de Ciencias de la Computación '
                this.thesisProtocol.thesis_protocol_assessor_address =
                    'Avenida San Claudio, Boulevard 14 Sur, Ciudad Universitaria, 72592'
                this.thesisProtocol.thesis_protocol_assessor_job_phone = '01 222 229 5500 ext. 7220'
                // this.thesisProtocol.thesis_protocol_second_assessor_name = ''
                // this.thesisProtocol.thesis_protocol_second_assessor_academic_degree = ''
                // this.thesisProtocol.thesis_protocol_second_assessor_phone = ''
                // this.thesisProtocol.thesis_protocol_second_assessor_institution = ''
                // this.thesisProtocol.thesis_protocol_second_assessor_adscription_department = ''
                // this.thesisProtocol.thesis_protocol_second_assessor_address = ''
                // this.thesisProtocol.thesis_protocol_second_assessor_job_phone = ''
                // this.thesisProtocol.thesis_protocol_second_assessor_justification = ''
            },
        },
    }
</script>
