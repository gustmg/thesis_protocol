<template>
    <v-container>
        <v-row>
            <v-col cols="6" offset-md="3">
                <v-card>
                    <v-card-title class="pl-8 pb-0">Registro</v-card-title>
                    <v-card-text>
                        <v-container>
                            <v-form v-model="valid" ref="form">
                                <v-row>
                                    <v-col cols="6" class="pb-0">
                                        <v-text-field
                                            v-model="firstName"
                                            :rules="nameRules"
                                            label="Nombre"
                                            outlined
                                            required
                                            autofocus
                                            validate-on-blur
                                            dense
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="6" class="pb-0">
                                        <v-text-field
                                            v-model="lastName"
                                            :rules="nameRules"
                                            label="Apellidos"
                                            outlined
                                            required
                                            validate-on-blur
                                            dense
                                        ></v-text-field>
                                    </v-col>
                                    <v-col v-if="newUserRadioGroup == 1" cols="4" class="pb-0">
                                        <v-text-field
                                            v-model="registrationNumber"
                                            :rules="registrationNumberRules"
                                            label="Matrícula"
                                            outlined
                                            required
                                            validate-on-blur
                                            dense
                                        ></v-text-field>
                                    </v-col>
                                    <v-col v-if="newUserRadioGroup == 1" cols="8" class="pb-0">
                                        <v-text-field
                                            v-model="career"
                                            :rules="nameRules"
                                            label="Carrera"
                                            outlined
                                            required
                                            validate-on-blur
                                            dense
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="12" class="pb-0">
                                        <v-text-field
                                            v-model="email"
                                            :rules="emailRules"
                                            label="Correo electrónico"
                                            outlined
                                            required
                                            validate-on-blur
                                            dense
                                        ></v-text-field>
                                    </v-col>
                                    <v-col
                                        v-if="newUserRadioGroup == 1 || newUserRadioGroup == 2"
                                        cols="6"
                                        class="pb-0"
                                    >
                                        <v-text-field
                                            v-model="phone"
                                            :rules="phoneRules"
                                            label="Teléfono personal"
                                            outlined
                                            validate-on-blur
                                            dense
                                        ></v-text-field>
                                    </v-col>
                                    <v-col
                                        v-if="newUserRadioGroup == 1 || newUserRadioGroup == 2"
                                        cols="6"
                                        class="pb-0"
                                    >
                                        <v-text-field
                                            v-model="jobPhone"
                                            :rules="phoneRules"
                                            label="Teléfono de trabajo"
                                            outlined
                                            validate-on-blur
                                            dense
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="6" class="pb-0">
                                        <v-text-field
                                            type="password"
                                            v-model="password"
                                            :rules="passwordRules"
                                            label="Contraseña"
                                            outlined
                                            required
                                            validate-on-blur
                                            dense
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="6" class="pb-0">
                                        <v-text-field
                                            type="password"
                                            v-model="passwordConfirmation"
                                            :rules="passwordConfirmationRules"
                                            label="Confirme su contraseña"
                                            outlined
                                            required
                                            validate-on-blur
                                            dense
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="6" class="py-0">
                                        <span>Tipo de usuario:</span>
                                        <v-radio-group v-model="newUserRadioGroup">
                                            <v-radio label="Estudiante" value="1"></v-radio>
                                            <v-radio label="Evaluador" value="2"></v-radio>
                                            <v-radio label="Administrador" value="3"></v-radio>
                                        </v-radio-group>
                                    </v-col>
                                </v-row>
                            </v-form>
                        </v-container>
                        <v-container class="py-0">
                            <v-row>
                                <v-col cols="6" align="center" class="text-body-2 font-weight-medium">
                                    Si ya es usuario registrado, puede
                                    <a href="login" class="text-decoration-none">iniciar sesión</a>.
                                </v-col>
                                <v-col cols="6">
                                    <v-btn
                                        class="primary"
                                        :loading="loading"
                                        v-on:click="registerUser"
                                        tile
                                        block
                                        :disabled="!valid"
                                    >
                                        Registrar usuario
                                    </v-btn>
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
    export default {
        data() {
            return {
                loading: false,
                newUserRadioGroup: '1',
                valid: false,
                firstName: '',
                lastName: '',
                registrationNumber: '',
                career: '',
                phone: '',
                jobPhone: '',
                email: '',
                password: '',
                passwordConfirmation: '',
                nameRules: [v => !!v || this.requiredFieldErrorMessage],
                emailRules: [
                    v => !!v || this.requiredFieldErrorMessage,
                    v => /.+@.+/.test(v) || 'Por favor, ingrese un correo electrónico válido.',
                ],
                passwordRules: [
                    v => !!v || this.requiredFieldErrorMessage,
                    v => v.length >= 9 || 'La contraseña debe contener al menos 9 caracteres.',
                ],
                registrationNumberRules: [
                    v => !!v || this.requiredFieldErrorMessage,
                    v => v.length == 9 || 'Por favor, ingrese su matrícula a 9 caracteres.',
                ],
                phoneRules: [v => v.length == 0 || v.length == 10 || 'Por favor, ingrese su teléfono a 10 dígitos.'],
                passwordConfirmationRules: [
                    v => !!v || this.requiredFieldErrorMessage,
                    () => this.password === this.passwordConfirmation || 'La contraseña ingresada no coincide.',
                ],
                termsAndConditionsCheckboxRules: [() => this.termsAndConditionsCheckbox == true || ''],
                requiredFieldErrorMessage: 'Este campo es requerido.',
            }
        },

        computed: {
            emailInputCols: function() {
                if (this.newUserRadioGroup == 1) {
                    return 8
                } else {
                    return 12
                }
            },
        },

        methods: {
            registerUser: function() {
                this.valid = false
                this.loading = true
                axios
                    .post('register', {
                        name: this.firstName + ' ' + this.lastName,
                        email: this.email,
                        password: this.password,
                        password_confirmation: this.passwordConfirmation,
                        registrationNumber: this.registrationNumber,
                        career: this.career,
                        phone: this.phone,
                        jobPhone: this.jobPhone,
                        userType: parseInt(this.newUserRadioGroup),
                    })
                    .then(response => {
                        console.log(response.data)
                    })
                    .catch(function(error) {
                        console.log(error)
                    })
            },
        },
    }
</script>
