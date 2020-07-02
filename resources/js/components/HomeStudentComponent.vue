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
                            <v-form v-model="generalInfoForm">
                                <div class="text-subheader-2">Titulo del proyecto</div>
                                <v-row>
                                    <v-col cols="12">
                                        <v-text-field
                                            v-model="title"
                                            :rules="textRules"
                                            placeholder="Ingrese el título de su tésis..."
                                            outlined
                                            required
                                            autofocus
                                        ></v-text-field>
                                    </v-col>
                                </v-row>
                                <div class="text-subheader-2">Institución de realización</div>
                                <v-row>
                                    <v-col cols="6">
                                        <v-text-field
                                            v-model="institutionName"
                                            :rules="textRules"
                                            label="Nombre de la institución"
                                            outlined
                                            required
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="6">
                                        <v-text-field
                                            v-model="institutionDepartment"
                                            :rules="textRules"
                                            label="Departamento"
                                            outlined
                                            required
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="9">
                                        <v-text-field
                                            v-model="institutionAddress"
                                            :rules="textRules"
                                            label="Dirección"
                                            outlined
                                            required
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="3">
                                        <v-text-field
                                            v-model="institutionPhone"
                                            :rules="textRules"
                                            label="Teléfono"
                                            outlined
                                            required
                                        ></v-text-field>
                                    </v-col>
                                </v-row>
                                <div class="text-subheader-2">Beca de tésis (Opcional)</div>
                                <v-row>
                                    <v-col cols="6">
                                        <v-text-field
                                            v-model="scholarshipInstitution"
                                            :rules="textRules"
                                            label="Institución que otorga la beca"
                                            outlined
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="3">
                                        <v-text-field
                                            v-model="scholarshipType"
                                            :rules="textRules"
                                            label="Tipo de beca"
                                            outlined
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="3">
                                        <v-text-field
                                            v-model="scholarshipVigency"
                                            :rules="textRules"
                                            label="Vigencia"
                                            outlined
                                        ></v-text-field>
                                    </v-col>
                                </v-row>
                                <div class="text-subheader-2">Asesor 1</div>
                                <v-row>
                                    <v-col cols="6">
                                        <v-text-field
                                            v-model="adviserName"
                                            :rules="textRules"
                                            label="Nombre del asesor"
                                            outlined
                                            required
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="3">
                                        <v-text-field
                                            v-model="adviserAcademicGrade"
                                            :rules="textRules"
                                            label="Grado académico del asesor"
                                            outlined
                                            required
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="3">
                                        <v-text-field
                                            v-model="adviserPhone"
                                            :rules="textRules"
                                            label="Teléfono particular"
                                            outlined
                                            required
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="6">
                                        <v-text-field
                                            v-model="adviserInstitution"
                                            :rules="textRules"
                                            label="Institución"
                                            outlined
                                            required
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="6">
                                        <v-text-field
                                            v-model="adviserDepartment"
                                            :rules="textRules"
                                            label="Departamento de adscripción"
                                            outlined
                                            required
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="9">
                                        <v-text-field
                                            v-model="adviserInstitutionAddress"
                                            :rules="textRules"
                                            label="Dirección"
                                            outlined
                                            required
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="3">
                                        <v-text-field
                                            v-model="adviserPhone"
                                            :rules="textRules"
                                            label="Teléfono"
                                            outlined
                                            required
                                        ></v-text-field>
                                    </v-col>
                                </v-row>
                                <div class="text-subheader-2">Asesor 2 (Opcional)</div>
                                <v-row>
                                    <v-col cols="6">
                                        <v-text-field
                                            v-model="secondAdviserName"
                                            :rules="textRules"
                                            label="Nombre del asesor"
                                            outlined
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="3">
                                        <v-text-field
                                            v-model="secondAdviserAcademicGrade"
                                            :rules="textRules"
                                            label="Grado académico del asesor"
                                            outlined
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="3">
                                        <v-text-field
                                            v-model="secondAdviserPhone"
                                            :rules="textRules"
                                            label="Teléfono particular"
                                            outlined
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="6">
                                        <v-text-field
                                            v-model="secondAdviserInstitution"
                                            :rules="textRules"
                                            label="Institución"
                                            outlined
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="6">
                                        <v-text-field
                                            v-model="secondAdviserDepartment"
                                            :rules="textRules"
                                            label="Departamento de adscripción"
                                            outlined
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="9">
                                        <v-text-field
                                            v-model="secondAdviserInstitutionAddress"
                                            :rules="textRules"
                                            label="Dirección"
                                            outlined
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="3">
                                        <v-text-field
                                            v-model="secondAdviserPhone"
                                            :rules="textRules"
                                            label="Teléfono"
                                            outlined
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="12">
                                        <v-textarea
                                            v-model="secondAdviserJustification"
                                            rows="6"
                                            outlined
                                            no-resize
                                            label="Justificación"
                                        >
                                        </v-textarea>
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
                                <div class="text-subheader-2">Resumen</div>
                                <v-row>
                                    <v-col cols="12">
                                        <editor
                                            v-model="proyectSummary"
                                            api-key="no-api-key"
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
                                            }"
                                        />
                                    </v-col>
                                </v-row>
                                <div class="text-subheader-2">Antecedentes del proyecto</div>
                                <v-row>
                                    <v-col cols="12">
                                        <editor
                                            v-model="proyectAntecedent"
                                            api-key="no-api-key"
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
                                            }"
                                        />
                                    </v-col>
                                </v-row>
                                <div class="text-subheader-2">Objetivos generales y específicos del proyecto</div>
                                <v-row>
                                    <v-col cols="12">
                                        <editor
                                            v-model="proyectGeneralObjective"
                                            api-key="no-api-key"
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
                                            }"
                                        />
                                    </v-col>
                                </v-row>
                                <div class="text-subheader-2">Metodología</div>
                                <v-row>
                                    <v-col cols="12">
                                        <editor
                                            v-model="proyectMethodology"
                                            api-key="no-api-key"
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
                                            }"
                                        />
                                    </v-col>
                                </v-row>
                                <div class="text-subheader-2">Cronograma de actividades</div>
                                <v-row>
                                    <v-col cols="12">
                                        <editor
                                            v-model="proyectSchedule"
                                            api-key="no-api-key"
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
                                            }"
                                        />
                                    </v-col>
                                </v-row>
                                <div class="text-subheader-2">Infraestructura</div>
                                <v-row>
                                    <v-col cols="12">
                                        <editor
                                            v-model="proyectInfrastructure"
                                            api-key="no-api-key"
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
                                            }"
                                        />
                                    </v-col>
                                </v-row>
                                <div class="text-subheader-2">Estado del campo del arte</div>
                                <v-row>
                                    <v-col cols="12">
                                        <editor
                                            v-model="proyectArtState"
                                            api-key="no-api-key"
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
                                            }"
                                        />
                                    </v-col>
                                </v-row>
                                <div class="text-subheader-2">Resultados esperados</div>
                                <v-row>
                                    <v-col cols="12">
                                        <editor
                                            v-model="proyectExpectedResults"
                                            api-key="no-api-key"
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
                                            }"
                                        />
                                    </v-col>
                                </v-row>
                                <div class="text-subheader-2">Impacto socioeconómico</div>
                                <v-row>
                                    <v-col cols="12">
                                        <editor
                                            v-model="proyectSocioeconomicImpact"
                                            api-key="no-api-key"
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
                                            }"
                                        />
                                    </v-col>
                                </v-row>
                                <div class="text-subheader-2">Aportaciones</div>
                                <v-row>
                                    <v-col cols="12">
                                        <editor
                                            v-model="proyectContributions"
                                            api-key="no-api-key"
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
                                            }"
                                        />
                                    </v-col>
                                </v-row>
                                <div class="text-subheader-2">Bibliografía</div>
                                <v-row>
                                    <v-col cols="12">
                                        <editor
                                            v-model="proyectBibliography"
                                            api-key="no-api-key"
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
                                            }"
                                        />
                                    </v-col>
                                </v-row>
                            </v-form>
                            <v-row>
                                <v-col cols="12" align="right" class="py-0">
                                    <v-btn
                                        color="primary"
                                        v-on:click="thesisProtocolStepper++"
                                        :disabled="!validProyectDescriptionForm"
                                    >
                                        Subir protocolo
                                    </v-btn>
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
                loading: false,
                thesisProtocolStepper: 2,
                //Form validator model
                generalInfoForm: false,
                // General info form inputs
                title: '',
                institutionName: '',
                institutionDepartment: '',
                institutionAddress: '',
                institutionPhone: '',
                scholarshipInstitution: '',
                scholarshipType: '',
                scholarshipVigency: '',
                adviserName: '',
                adviserAcademicGrade: '',
                adviserPhone: '',
                adviserInstitution: '',
                adviserDepartment: '',
                adviserInstitutionAddress: '',
                adviserPhone: '',
                secondAdviserName: '',
                secondAdviserAcademicGrade: '',
                secondAdviserPhone: '',
                secondAdviserInstitution: '',
                secondAdviserDepartment: '',
                secondAdviserInstitutionAddress: '',
                secondAdviserPhone: '',
                secondAdviserJustification: '',
                //Validations
                textRules: [v => !!v || this.requiredFieldErrorMessage],
                requiredFieldErrorMessage: 'Este campo es requerido.',

                //Proyect description form inputs
                proyectSummary: '',
                proyectAntecedent: '',
                proyectGeneralObjective: '',
                proyectMethodology: '',
                proyectSchedule: '',
                proyectInfrastructure: '',
                proyectArtState: '',
                proyectExpectedResults: '',
                proyectSocioeconomicImpact: '',
                proyectContributions: '',
                proyectBibliography: '',
            }
        },
    }
</script>
