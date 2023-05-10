<script>
import { mapGetters, mapActions } from "vuex";

export default {
  name:'ListPost',
  created(){
    this.loadPost();
  },
  methods: {
    ...mapActions('post',['loadPost'])
  },
  computed: {
    ...mapGetters('post',['posts'])
  }
};
</script>

<template>
  <div>
    <h2>Publicaciones</h2>
    <ul>
      <li v-for="(post, index) in posts" :key="index">
        <h3>{{ post.title }}</h3>
        <p>{{ post.body }}</p>
        <!-- <ul>
          <li v-for="(comment, index) in post.comments" :key="index">
            <p>{{ comment.body }}</p>
          </li>
        </ul> -->
      </li>
    </ul>
    
  </div>
</template>

<style scoped>
.read-the-docs {
  color: #888;
}
</style>
