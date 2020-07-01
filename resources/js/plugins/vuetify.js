import Vue from "vue";
import Vuetify from "vuetify";

Vue.use(Vuetify);

const opts = {
    theme: {
        themes: {
            light: {
                primary: "#007569",
                secondary: "#3AC2B4",
                accent: "#00C2AE",
                error: "#B00020",
                info: "#2196F3",
                success: "#4CAF50",
                warning: "#FFC107"
            }
        }
    }
};

export default new Vuetify(opts);
