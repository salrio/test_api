import { createStore } from 'vuex'
import 'es6-promise/auto'
import createPersistedState from "vuex-persistedstate"

const store = createStore({
	plugins: [createPersistedState()],
	state () {
		return {
			authToken: "",
			userInfo: {},
		}
	},
	mutations: {
		updateToken (state, sessionInfo) {
			state.authToken = sessionInfo.authToken;
			state.userInfo = sessionInfo.userInfo;
		},
		logoutStore (state, sessionInfo) {
			state.authToken = "";
			state.userInfo = {};
		}
	}
});

export default store