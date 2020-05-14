import './bootstrap'
import Vue from 'vue'
import AnswerLike from './components/AnswerLike'
import ThemeTagsInput from './components/ThemeTagsInput'
import FollowButton from './components/FollowButton'



const app = new Vue({
  el: '#app',
  components: {
    AnswerLike,
    ThemeTagsInput,
    FollowButton,
  }
})
