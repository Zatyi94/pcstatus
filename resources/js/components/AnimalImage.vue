<template>
    <img v-on:click.exact="loadDogImg" v-on:click.ctrl="loadCatImg" v-bind:src="src" alt="">

    <img @click="loadDogImg" @click.ctrl="loadCatImg" :src="src" alt="">
</template>

<script>
export default {
    name: "AnimalImage",
    data() {
        return {
            src: "sah",
        };
    },
    methods: {
      loadCatImg(event){
          console.log("load new cat image");
          this.axios
              .get('https://api.thecatapi.com/v1/images/search')
              .then((response) => {
                  console.log(response.data[0].url);
                  this.src = response.data[0].url;
              })
              .catch(()=>{
                  console.log('SIKERTELEN API HÍVÁS');
              });
      },
      loadDogImg(){
          console.log("load new dog image");
          this.axios
              .get('https://api.thedogapi.com/v1/images/search')
              .then((response) => {
                  console.log(response.data[0].url);
                  this.src = response.data[0].url;
              })
              .catch(()=>{
                  console.log('SIKERTELEN API HÍVÁS');
              });
      }
    },
    mounted() {
        console.log("AnimalImage MOUNTED");
        this.loadCatImg();
    }
}
</script>

<style scoped>

</style>
