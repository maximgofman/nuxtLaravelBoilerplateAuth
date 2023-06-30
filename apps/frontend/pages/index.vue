<template>
  <div>
    <b-card>
      <b-card-text class="d-flex justify-content-center">
        <h1>Post Manager</h1>
      </b-card-text>
    </b-card>
    <b-container>
<b-row>
        <b-col>
          <b-card>
            <b-card-text>
              <b-form @submit.prevent="sendPost">
                <b-form-group
                  id="input-group-1"
                  label="Sample Post"
                  label-for="input-1"
                >
                  <b-form-input
                    id="input-1"
                    v-model="samplePostText"
                    type="text"
                    required
                    placeholder="Enter something..."
                  ></b-form-input>
                </b-form-group>
                <b-button type="submit" variant="primary">Submit</b-button>
                <b-spinner variant="success" type="grow" label="Spinning" v-if="isLoading"></b-spinner>
              </b-form>
            </b-card-text>
          </b-card>
        </b-col>
      </b-row>
      <b-row>
        <b-col>
          <b-card>
            {{ posts }}
            <b-card-text v-for="post in posts">
              {{ post.text }} <
            </b-card-text><!-- hier die for schleife -->
          </b-card>
        </b-col>
      </b-row>

    </b-container>
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
  posts: any = '';
  samplePostText: string = '';

  isLoading: boolean = false;


  // api get method
  async mounted() {

    console.log('mounted')
    await axios.get('http://localhost/api/posts')
      .then(response => {
        this.posts = response.data;
      })
      .catch(error => {
        console.log(error);
      });

  }


  // api post method
  public sendPost() {
    this.isLoading = true;
    axios.post('http://localhost/api/posts', {
      user_id:1,
      post_message: this.samplePostText
    }
    )
    .then(function (response) {

      console.log(response); // hier true false raektion und loading
    })
    .catch(function (error) {
      console.log(error);
    });
    this.isLoading = false;
  }
}

</script>
