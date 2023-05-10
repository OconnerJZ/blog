import axios from "axios";

const BASE_URL = "http://localhost/blog/server/public/api";

const post = {
  namespaced:true,
  state: {
    posts: [],
  },
  mutations: {
    setPosts: (state, posts) => (state.posts = posts),
  },
  getters: {
    getPosts(state) {
      return state.posts;
    },
  },
  actions: {
    loadPost: async function({ commit }) {
      try {
        const response = await axios.get(`${BASE_URL}/posts`);
        const posts = response.data;
        commit("setPosts", posts);
      } catch (error) {
        console.error(error);
      }
    },
  },
};

export default post;
