<template>
  <div>
    <h1>Home page</h1>
    {{ test }}

    <input type="samplePostText" v-model="samplePostText">
    <button @click="samplePost()">Post</button>
  </div>
</template>
<script lang="ts">
import Vue from 'vue'
import axios from "axios"
import {Component} from 'nuxt-property-decorator'

@Component({
  layout: 'default'
})
export default class Index extends Vue {
  test: any = '';
  samplePostText: string = '';

  // api get method
  async mounted() {

    console.log('mounted')
    await axios.get('http://localhost/api/test')
      .then(response => {
        this.test = response.data;
      })
      .catch(error => {
        console.log(error);
      });

  }


  // api post method
  public samplePost() {
    axios.post('http://localhost/api/test', {
      samplePostText: this.samplePostText
    })
    .then(function (response) {
      console.log(response);
    })
    .catch(function (error) {
      console.log(error);
    });
  }
}

</script>
