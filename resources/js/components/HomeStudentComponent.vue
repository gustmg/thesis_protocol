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
                                            label="Institución que otorga la beca"
                                            outlined
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="3">
                                        <v-text-field
                                            v-model="scholarshipType"
                                            label="Tipo de beca"
                                            outlined
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="3">
                                        <v-text-field
                                            v-model="scholarshipVigency"
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
                                            v-model="adviserParticularPhone"
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
                                            label="Nombre del asesor"
                                            outlined
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="3">
                                        <v-text-field
                                            v-model="secondAdviserAcademicGrade"
                                            label="Grado académico del asesor"
                                            outlined
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="3">
                                        <v-text-field
                                            v-model="secondAdviserPhone"
                                            label="Teléfono particular"
                                            outlined
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="6">
                                        <v-text-field
                                            v-model="secondAdviserInstitution"
                                            label="Institución"
                                            outlined
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="6">
                                        <v-text-field
                                            v-model="secondAdviserDepartment"
                                            label="Departamento de adscripción"
                                            outlined
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="9">
                                        <v-text-field
                                            v-model="secondAdviserInstitutionAddress"
                                            label="Dirección"
                                            outlined
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="3">
                                        <v-text-field
                                            v-model="secondAdviserPhone"
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
                                            }"
                                        />
                                    </v-col>
                                </v-row>
                                <div class="text-subheader-2">Antecedentes del proyecto</div>
                                <v-row>
                                    <v-col cols="12">
                                        <editor
                                            v-model="proyectAntecedent"
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
                                            }"
                                        />
                                    </v-col>
                                </v-row>
                                <div class="text-subheader-2">Objetivos generales y específicos del proyecto</div>
                                <v-row>
                                    <v-col cols="12">
                                        <editor
                                            v-model="proyectGeneralObjective"
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
                                            }"
                                        />
                                    </v-col>
                                </v-row>
                                <div class="text-subheader-2">Metodología</div>
                                <v-row>
                                    <v-col cols="12">
                                        <editor
                                            v-model="proyectMethodology"
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
                                            }"
                                        />
                                    </v-col>
                                </v-row>
                                <div class="text-subheader-2">Cronograma de actividades</div>
                                <v-row>
                                    <v-col cols="12">
                                        <editor
                                            v-model="proyectSchedule"
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
                                            }"
                                        />
                                    </v-col>
                                </v-row>
                                <div class="text-subheader-2">Infraestructura</div>
                                <v-row>
                                    <v-col cols="12">
                                        <editor
                                            v-model="proyectInfrastructure"
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
                                            }"
                                        />
                                    </v-col>
                                </v-row>
                                <div class="text-subheader-2">Estado del campo del arte</div>
                                <v-row>
                                    <v-col cols="12">
                                        <editor
                                            v-model="proyectArtState"
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
                                            }"
                                        />
                                    </v-col>
                                </v-row>
                                <div class="text-subheader-2">Resultados esperados</div>
                                <v-row>
                                    <v-col cols="12">
                                        <editor
                                            v-model="proyectExpectedResults"
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
                                            }"
                                        />
                                    </v-col>
                                </v-row>
                                <div class="text-subheader-2">Impacto socioeconómico</div>
                                <v-row>
                                    <v-col cols="12">
                                        <editor
                                            v-model="proyectSocioeconomicImpact"
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
                                            }"
                                        />
                                    </v-col>
                                </v-row>
                                <div class="text-subheader-2">Aportaciones</div>
                                <v-row>
                                    <v-col cols="12">
                                        <editor
                                            v-model="proyectContributions"
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
                                            }"
                                        />
                                    </v-col>
                                </v-row>
                                <div class="text-subheader-2">Bibliografía</div>
                                <v-row>
                                    <v-col cols="12">
                                        <editor
                                            v-model="proyectBibliography"
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
                                            }"
                                        />
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
                                <v-col col="12" align="center" v-if="thesisProtocolStatusId == 1">
                                    <v-icon size="80" class="primary--text">mdi-file-edit</v-icon>
                                    <div class="text-md-h4">¡Protocolo en revisión!</div>
                                    <div class="text-md-h6">
                                        Uno de los evaluadores se encargará de revisarlo.
                                    </div>
                                </v-col>
                                <v-col col="12" align="center" v-else-if="thesisProtocolStatusId == 2">
                                    <v-icon size="80" class="primary--text">mdi-check-outline</v-icon>
                                    <div class="text-md-h4">¡Protocolo aprobado!</div>
                                    <div class="text-md-h6">
                                        Felicidades. Se ha aprobado tu protocolo.
                                    </div>
                                </v-col>
                                <v-col col="12" align="center" v-else-if="thesisProtocolStatusId == 3">
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
                thesisProtocolStepper: 3,
                //Form validator model
                generalInfoForm: false,
                // General info form inputs
                // title: '',
                // institutionName: '',
                // institutionDepartment: '',
                // institutionAddress: '',
                // institutionPhone: '',
                // scholarshipInstitution: '',
                // scholarshipType: '',
                // scholarshipVigency: '',
                // adviserName: '',
                // adviserAcademicGrade: '',
                // adviserParticularPhone: '',
                // adviserInstitution: '',
                // adviserDepartment: '',
                // adviserInstitutionAddress: '',
                // adviserPhone: '',
                // secondAdviserName: '',
                // secondAdviserAcademicGrade: '',
                // secondAdviserPhone: '',
                // secondAdviserInstitution: '',
                // secondAdviserDepartment: '',
                // secondAdviserInstitutionAddress: '',
                // secondAdviserPhone: '',
                // secondAdviserJustification: '',

                // General info form inputs TEST
                title:
                    'Aplicación Colaborativa para Gestionar la Evaluación de la Titulación por Experiencia Profesional',
                institutionName: 'Benemérita Universidad Autónoma de Puebla. ',
                institutionDepartment: 'Facultad de Ciencias de la Computación BUAP',
                institutionAddress: 'Avenida San Claudio, Blvrd 14 Sur, Cdad. Universitaria, 72592 Puebla, Pue.',
                institutionPhone: '01 222 229 5500 ext. 7204',
                scholarshipInstitution: '',
                scholarshipType: '',
                scholarshipVigency: '',
                adviserName: 'Maria Luz Adolfina  Sánchea Gálvez',
                adviserAcademicGrade: 'Doctorado',
                adviserParticularPhone: '222-244-6117',
                adviserInstitution: 'Benemérita Universidad Autónoma de Puebla',
                adviserDepartment: 'Facultad de Ciencias de la Computación',
                adviserInstitutionAddress: 'Avenida San Claudio, Boulevard 14 Sur, Ciudad Universitaria, 72592',
                adviserPhone: '01 222 229 5500 ext. 7220',
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
                // proyectSummary: '',
                // proyectAntecedent: '',
                // proyectGeneralObjective: '',
                // proyectMethodology: '',
                // proyectSchedule: '',
                // proyectInfrastructure: '',
                // proyectArtState: '',
                // proyectExpectedResults: '',
                // proyectSocioeconomicImpact: '',
                // proyectContributions: '',
                // proyectBibliography: '',

                //Proyect description form inputs TEST
                proyectSummary:
                    '"<p>El presente proyecto consiste en desarrollar una aplicaci&oacute;n colaborativa que permita llevar a cabo la Evaluaci&oacute;n de la Titulaci&oacute;n por Experiencia Profesional.&nbsp; Por consiguiente, ser&aacute; necesario presentar a los diversos usuarios las interfaces adecuadas (con un dise&ntilde;o intuitivo, responsivo y f&aacute;cil de usar), para su buen funcionamiento. Por tanto, esta aplicaci&oacute;n estar&aacute; orientada en tres componentes primarios:</p>\n<ol>\n<li>La tecnolog&iacute;a …o a la misma. Proceso que involucra actores, roles, tareas, recursos compartidos</li>\n<li><strong>La coordinaci&oacute;n.</strong> Gestiona las dependencias entre las actividades realizadas en el grupo para alcanzar el objetivo. Una colaboraci&oacute;n efectiva requiere de una planificaci&oacute;n y sincronizaci&oacute;n de las actividades que se realizan en el grupo, por lo que ser&aacute; necesario la identificaci&oacute;n, de la distribuci&oacute;n y delegaci&oacute;n de responsabilidades.</li>\n</ol>"',
                proyectAntecedent:
                    '"<p>En la Facultad de Ciencias de la Computaci&oacute;n, los egresados pueden obtener el grado de licenciado, optando por la Titulaci&oacute;n por Experiencia Profesional, que es una estrategia adecuada para incrementar el &iacute;ndice de titulados en dicha facultad y que est&aacute; centrada en aquellos que llevan m&aacute;s de 5 a&ntilde;os laborando. El proceso que se requiere para evaluar los proyectos que avalan la experiencia profesional de los sustentantes, actualmente se realiza a mano. Por tanto, …ante y los documentos de los sustentantes est&aacute;n a disposici&oacute;n de estos evaluadores.</p>\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; La aplicaci&oacute;n se desarrollar&aacute; utilizando las tecnolog&iacute;as web: HTML (<em>HyperText Markup Language</em>) [1], CSS (<em>Cascading Style Sheets</em>) [2], Javascript [3], PHP (<em>Hypertext Pre-Processor</em>) [4], SQL (<em>Structured Query Language</em>) [5], servidor Xampp [6], editor de c&oacute;digo Brackets [7], Codelgniter [8] y Bootstrap [9].</p>"',
                proyectGeneralObjective:
                    '"<p>El objetivo general del trabajo de tesis es: Elaborar una aplicaci&oacute;n que permita gestionar todo el proceso que se lleva a cabo la titulaci&oacute;n por experiencia profesional.</p>\n<p>Mientras que los objetivos espec&iacute;ficos son:</p>\n<ol>\n<li>Crear un prototipo para el proceso de evaluaci&oacute;n de la titulaci&oacute;n por experiencia profesional.</li>\n<li>Generar un entorno colaborativo apropiado para compartir la informaci&oacute;n requerida, as&iacute; como propiciar la colaboraci&oacute;n, coordinaci&oacute;n y comunicaci&oacute;n entre los roles participantes.</li>\n<li>Proporcionar interfaces robustas, usables y seguras a los usuarios.</li>\n<li>Elaborar el documento de tesis.</li>\n<li>Presentar la tesis.</li>\n</ol>"',
                proyectMethodology:
                    '"<p>Los pasos a seguir para desarrollar la aplicaci&oacute;n son:</p>\n<ol>\n<li>Analizar aplicaciones similares a la que se desarrollar&aacute; en este trabajo.</li>\n<li>Revisar las tecnolog&iacute;as web que se utilizar&aacute;n en el desarrollo del proyecto.</li>\n<li>Definir la metodolog&iacute;a a seguir para dicho desarrollo.</li>\n<li>Especificar los requisitos.</li>\n<li>Establecer el dise&ntilde;o.</li>\n<li>Elaborar la implementaci&oacute;n.</li>\n<li>Realizar las pruebas.</li>\n<li>Crear un prototipo.</li>\n<li>Escribir el documento de tesis.</li>\n<li>Presentar la tesis.</li>\n</ol>"',
                proyectSchedule:
                    '"<p>El cronograma de actividades se muestra a continuaci&oacute;n:</p>\n<p>&nbsp;</p>\n<table width="535">\n<tbody>\n<tr>\n<td width="102">\n<p><strong>ACTIVIDAD</strong></p>\n</td>\n<td width="106">\n<p><strong>MAYO</strong></p>\n</td>\n<td width="113">\n<p><strong>JUNIO </strong></p>\n</td>\n<td width="113">\n<p><strong>JULIO</strong></p>\n</td>\n<td width="100">\n<p><strong>AGOSTO</strong></p>\n</td>\n</tr>\n<tr>\n<td width="102">\n<p><strong>1</strong></p>\n</td>\n<td width="106">\n<p>&n…;</p>\n</td>\n</tr>\n<tr>\n<td width="102">\n<p><strong>9</strong></p>\n</td>\n<td width="106">\n<p>&nbsp;</p>\n</td>\n<td width="113">\n<p>&nbsp;</p>\n</td>\n<td width="113">\n<p>&nbsp;</p>\n</td>\n<td width="100">\n<p>&nbsp;</p>\n</td>\n</tr>\n<tr>\n<td width="102">\n<p><strong>10</strong></p>\n</td>\n<td width="106">\n<p>&nbsp;</p>\n</td>\n<td width="113">\n<p>&nbsp;</p>\n</td>\n<td width="113">\n<p>&nbsp;</p>\n</td>\n<td width="100">\n<p>&nbsp;</p>\n</td>\n</tr>\n</tbody>\n</table>"',
                proyectInfrastructure:
                    '"<p>El <em>hardware</em> a utilizar para el desarrollo de la aplicaci&oacute;n es:</p>\n<ul>\n<li>lenovo G50</li>\n<li>Sistema operativo Windows 10 Pro</li>\n<li>Disco duro de 1tb</li>\n<li>Procesador Intel Celeron N2830 (2.16 GHz 1600 MHz 1 MB)</li>\n<li>4 GB DE RAM</li>\n<li>Pantalla de 15,6&rdquo;&nbsp;HD (1366 x 768)</li>\n<li>Gr&aacute;ficos Intel HD</li>\n<li>Conectores:</li>\n</ul>\n<ul>\n<li>1 USB 3.0</li>\n<li>2 USB 2,0</li>\n<li>Combo de conectores para audio (auricular y micr&oacute;fono)</li>\n<…<ul>\n<li><strong>Tecnolog&iacute;as de cliente</strong>: permiten crear interfaces de usuario y establecer comunicaci&oacute;n con el servidor basadas en HTML, CSS y JavaScript, en este caso, el navegador actuara como int&eacute;rprete. As&iacute; como Bootstrap.</li>\n<li><strong>Tecnolog&iacute;as de servidor:</strong> Implementar comportamientos de la aplicaci&oacute;n web en el servidor PHP XAMPP, Codelgniter</li>\n<li>Adem&aacute;s se utilizar&aacute; el editor de C&oacute;digo: Brackets</li>\n</ul>"',
                proyectArtState:
                    '"<p>El estado del arte es una modalidad de la investigaci&oacute;n documental que permite el estudio del conocimiento acumulado (escrito en textos) dentro de un &aacute;rea espec&iacute;fica. Sus or&iacute;genes se remontan a los a&ntilde;os ochenta, &eacute;poca en la que se utilizaba como herramienta para compilar y sistematizar informaci&oacute;n especialmente el &aacute;rea de ciencias sociales, sin embargo, en la medida en que estos estudios se realizaron con el fin de hacer balances sobre las tendencias de investigaci&oacute;n y como punto de partida para la toma de decisiones, el estado del arte se posicion&oacute; como una modalidad de investigaci&oacute;n.</p>"',
                proyectExpectedResults:
                    '"<p>Los principales resultados de esta tesis son:</p>\n<ol>\n<li>El prototipo de la aplicaci&oacute;n para evaluar la Titulaci&oacute;n por Experiencia Profesional.</li>\n<li>La aplicaci&oacute;n de una metodolog&iacute;a para el desarrollo de dicha aplicaci&oacute;n.</li>\n<li>La aplicaci&oacute;n de diferentes tecnolog&iacute;as web.</li>\n<li>El documento de tesis.</li>\n<li>La obtenci&oacute;n del grado de Licenciada en la Ingenier&iacute;a en Ciencias de la Computaci&oacute;n.</li>\n</ol>"',
                proyectSocioeconomicImpact:
                    '"<p>El impacto socioecon&oacute;mico se centra en reducci&oacute;n de gastos, papel y tiempo. As&iacute; como reducir el estr&eacute;s a los sustentantes.</p>"',
                proyectContributions:
                    '"<p>La principal aportaci&oacute;n es una aplicaci&oacute;n que permita evaluar colaborativamente los expedientes de los sustentantes para la Titulaci&oacute;n por Experiencia Profesional y emitir un dictamen a cada uno de &eacute;stos. Simplificando y agilizando este proceso con interfaces de usuario robustas, usables y seguras.</p>"',
                proyectBibliography:
                    '"<ul>\n<li>Jon Ducket, HTML &amp; CSS Design and build Websites. Firth Edition. John Wiley &amp; Sons, Inc. 2011</li>\n<li>Goldstein, Alexis. (2011). HTML5 y CSS3. Madrid: Anaya Multimedia-Anaya Interactiva.</li>\n<li>(2013). Aprender HTML5, CSS3 y Javascript con 100 .Barcelona: Marcombo, S.A..</li>\n<li>heurtel,olivier. (2019). PHP 7 2&ordf; edici&oacute;n: Desarrollar un sitio web din&aacute;mico e interactivo. Barcelona: Ediciones Eni.</li>\n<li>Welling, Luke Thomson, Laura. (2017). Desarrollo Web con PH…oyectos Tecnol&oacute;gicos . 2019, de Universidad Nacional de la Rioja Sitio web: <a href="https://reunir.unir.net/bitstream/handle/">https://reunir.unir.net/bitstream/handle/</a></li>\n<li>Cardenas Pina, C&eacute;sar Iv&aacute;n; Uriol Olivares, David Eloy. (2016). Sistema web para la gesti&oacute;n documental de titulaci&oacute;n. 2019, de Universidad Nacional deTrujillo Sitio web: <a href="http://dspace.unitru.edu.pe/handle/UNITRU/7940">http://dspace.unitru.edu.pe/handle/UNITRU/7940</a></li>\n</ul>"',

                institute: [],
                scholarship: [],
                assessor: [],
            }
        },

        methods: {
            saveProtocol: function() {
                this.loading = true

                this.institute.push(this.institutionName)
                this.institute.push(this.institutionDepartment)
                this.institute.push(this.institutionAddress)
                this.institute.push(this.institutionPhone)

                if (this.scholarshipInstitution != '' && this.scholarshipType != '' && this.scholarshipVigency != '') {
                    this.scholarship.push(this.scholarshipInstitution)
                    this.scholarship.push(this.scholarshipType)
                    this.scholarship.push(this.scholarshipVigency)
                }

                if (
                    this.adviserName != '' &&
                    this.adviserAcademicGrade != '' &&
                    this.adviserPhone != '' &&
                    this.adviserInstitution != '' &&
                    this.adviserDepartment != '' &&
                    this.adviserInstitutionAddress != '' &&
                    this.adviserPhone != ''
                ) {
                    this.assessor.push(this.adviserName)
                    this.assessor.push(this.adviserAcademicGrade)
                    this.assessor.push(this.adviserPhone)
                    this.assessor.push(this.adviserInstitution)
                    this.assessor.push(this.adviserDepartment)
                    this.assessor.push(this.adviserInstitutionAddress)
                    this.assessor.push(this.adviserPhone)
                }

                axios
                    .post('thesis_protocols', {
                        thesis_protocol_title: this.title,
                        thesis_protocol_institution: this.institute,
                        thesis_protocol_scholarship: this.scholarship,
                        thesis_protocol_assessor: this.assessor,
                        thesis_protocol_summary: this.proyectSummary,
                        thesis_protocol_antecedent: this.proyectAntecedent,
                        thesis_protocol_general_objective: this.proyectGeneralObjective,
                        thesis_protocol_methodology: this.proyectMethodology,
                        thesis_protocol_schedule: this.proyectSchedule,
                        thesis_protocol_infrastructure: this.proyectInfrastructure,
                        thesis_protocol_art_state: this.proyectArtState,
                        thesis_protocol_expected_results: this.proyectExpectedResults,
                        thesis_protocol_socioeconomic_impact: this.proyectSocioeconomicImpact,
                        thesis_protocol_contributions: this.proyectContributions,
                        thesis_protocol_bibliography: this.proyectBibliography,
                    })
                    .then(response => {
                        this.thesisProtocolStepper++
                    })
                    .catch(function(error) {
                        console.log(error)
                    })
            },
        },
    }
</script>
