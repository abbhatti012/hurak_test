<template>
  <div class="parentDiv">
    <div v-for="total in increments" :key="total">
      <div v-if="IsNotSort" class="box" :style="{backgroundColor: color}">
        {{ total }}
      </div>
    </div>
    <div v-for="total in increments.slice().reverse()" :key="total">
      <div v-if="!IsNotSort" class="box" :style="{backgroundColor: color}">
        {{ total }}
      </div>
    </div>
    <div>
      <br><br>
      <button @click="chageColor">Shuffle</button>
      <button @click="chageSort">Sort Boxes</button>
    </div>
  </div>
</template>

<script>
export default {
  name: 'HelloWorld',
  props: {
    msg: String
  },
  mounted: function () {
    this.timer = setInterval(() => {
      this.totalCount = this.totalCount + 1;
      this.increments.push(this.totalCount);
      this.randomColor();
      if(this.totalCount == 5){
        clearInterval(this.timer)
        this.sendEmail()
      }
    }, 1000)
  },

  data() {
    return {
      timer: null,
      totalCount : 0,
      increments : [],
      colorCache: {},
      color: '',
      IsNotSort : true
    }
  },
  methods: {
    randomColor() {
      this.color = '#'+(Math.random()*0xFFFFFF<<0).toString(16);
    },
    sendEmail() {
      this.$axios
        .get(
          // Find mail.php file from root directory and place that File In Server
            "serverURl/mail.php",
        )
        .then(res => {
          console.log(res)
            this.sent = true;
        });
    },
    chageColor(){
      this.randomColor();
    },
    chageSort(){
      this.IsNotSort = false;
    }
  },

  beforeDestroy() {
    clearInterval(this.timer)
  }
}
</script>

<style scoped>
  .box{
    height: 40px;
    width: 100px;
    background: green;
  }
  .parentDiv{
    display: flex;
    gap: 15px;
  }
</style>
