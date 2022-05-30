<template>
    Profi kutya

    <label for="choose">Válassz típust:</label>
    <select id="choose" v-model="selected_breed">
        <option v-for="breed in breeds"
                :value="breed">
            {{breed.breed_group}} / {{ breed.name }}
        </option>
    </select>
    <br>
    <img v-if="selected_breed"
        :src="selected_breed.image.url"
        :alt=" 'Kiválasztott fajta - ' + selected_breed.name"
        style="height: 300px">
    <br>
    <table v-if="selected_breed">
        <tr>
            <td>Átlagos súly:</td>
            <td>{{ selected_breed.weight.metric }}</td>
        </tr>
        <tr>
            <td>Átlagos magasság:</td>
            <td>{{ selected_breed.height.metric }}</td>
        </tr>
        <tr>
            <td>Jellemzők:</td>
            <td>{{ selected_breed.temperament }}</td>
        </tr>
    </table>

    <hr>

    <div v-if="selected_breed">
        <button @click="getImages">Képek kérése!</button>

        <div v-for="image in images">
            <img :src="image.url" alt="" style="height: 300px;">
        </div>

    </div>

    <!-- {{selected_breed}} -->

</template>

<script>
export default {
    name: "AdvancedAnimal",
    data() {
        return {
            selected_breed : null,
                /* {
                image : { url : "" }

            }, */
            breeds : [

                /*
                {id:1, text:"Spicc"},
                {id:2, text:"Tacskó"}
                 */
            ],
            images: []
        };
    },
    methods: {
        getBreeds() {
            this.axios
                .get('https://api.thedogapi.com/v1/breeds')
                .then((response) => {
                    this.breeds = response.data;
                })
                .catch(()=>{
                    console.log('API HIBA - Breeds');
                });
        },
        getImages() {
            this.axios
                .get('https://api.thedogapi.com/v1/images/search?breed_ids=' +
                    this.selected_breed.id + '&limit=5')
                .then((response) => {
                    console.log(response.data);
                    this.images = response.data;
                })
                .catch(() => {
                    console.log("API HIBA - Images");
                });
        }
    },
    mounted() {
        this.getBreeds();
    }

}
</script>

<style scoped>

</style>
