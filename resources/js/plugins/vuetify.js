import Vue from 'vue'
import Vuetify from 'vuetify'

Vue.use(Vuetify)

const opts = {
    theme: {
        themes: {
            light: {
                primary: '#003b5c',
                secondary: '#3b6589',
                accent: '#0093E8',
                error: '#B00020',
                info: '#2196F3',
                success: '#4CAF50',
                warning: '#FFC107',
            },
        },
    },
}

export default new Vuetify(opts)
