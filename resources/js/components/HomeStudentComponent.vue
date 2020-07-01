<template>
    <v-container>
        <v-row>
            <v-col cols="12">
                <v-stepper v-model="thesisProtocolStepper" vertical>
                    <v-stepper-step step="1">
                        Datos generales
                    </v-stepper-step>
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
                                            required
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="3">
                                        <v-text-field
                                            v-model="scholarshipType"
                                            :rules="textRules"
                                            label="Tipo de beca"
                                            outlined
                                            required
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="3">
                                        <v-text-field
                                            v-model="scholarshipVigency"
                                            :rules="textRules"
                                            label="Vigencia"
                                            outlined
                                            required
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
                                            required
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="3">
                                        <v-text-field
                                            v-model="secondAdviserAcademicGrade"
                                            :rules="textRules"
                                            label="Grado académico del asesor"
                                            outlined
                                            required
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="3">
                                        <v-text-field
                                            v-model="secondAdviserPhone"
                                            :rules="textRules"
                                            label="Teléfono particular"
                                            outlined
                                            required
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="6">
                                        <v-text-field
                                            v-model="secondAdviserInstitution"
                                            :rules="textRules"
                                            label="Institución"
                                            outlined
                                            required
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="6">
                                        <v-text-field
                                            v-model="secondAdviserDepartment"
                                            :rules="textRules"
                                            label="Departamento de adscripción"
                                            outlined
                                            required
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="9">
                                        <v-text-field
                                            v-model="secondAdviserInstitutionAddress"
                                            :rules="textRules"
                                            label="Dirección"
                                            outlined
                                            required
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="3">
                                        <v-text-field
                                            v-model="secondAdviserPhone"
                                            :rules="textRules"
                                            label="Teléfono"
                                            outlined
                                            required
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="12">
                                        <v-textarea rows="6" outlined no-resize label="Justificación"> </v-textarea>
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
                </v-stepper>
            </v-col>
        </v-row>
    </v-container>
</template>
<script>
    export default {
        data() {
            return {
                thesisProtocolStepper: 1,
                loading: false,
                generalInfoForm: false,
                title: '',
                textRules: [v => !!v || this.requiredFieldErrorMessage],
                requiredFieldErrorMessage: 'Este campo es requerido.',
            }
        },
    }
</script>
