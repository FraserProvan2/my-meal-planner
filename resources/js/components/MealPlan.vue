<template>
 <div class="table-responsive">
    <table class="table table-light table-borderless text-center mb-0">
      <tbody v-if="this.planMemory">
        <tr>
          <td class="bg-primary text-white"></td>
          <td class="bg-primary text-white">Monday</td>
          <td class="bg-primary text-white">Tuesday</td>
          <td class="bg-primary text-white">Wednesday</td>
          <td class="bg-primary text-white">Thursday</td>
          <td class="bg-primary text-white">Friday</td>
          <td class="bg-primary text-white">Saturday</td>
          <td class="bg-primary text-white">Sunday</td>
        </tr>
        <tr>
          <td class="bg-secondary align-middle">Breakfast</td>
          
          <!-- Monday breakfast -->
          <td>
            <meal-plan-item :plan="this.planMemory.monday.breakfast" />
          </td>

          <!-- Tuesday breakfast -->
          <td>
            <meal-plan-item :plan="this.planMemory.tuesday.breakfast" />
          </td>

          <!-- Wednesday breakfast -->
          <td>
            <meal-plan-item :plan="this.planMemory.wednesday.breakfast" />
          </td>

          <!-- Thursday breakfast -->
          <td>
            <meal-plan-item :plan="this.planMemory.thursday.breakfast" />
          </td>

          <!-- Friday breakfast -->
          <td>
            <meal-plan-item :plan="this.planMemory.friday.breakfast" />
          </td>

          <!-- Saturday breakfast -->
          <td>
            <meal-plan-item :plan="this.planMemory.saturday.breakfast" />
          </td>
          
          <!-- Sunday breakfast -->
          <td>
            <meal-plan-item :plan="this.planMemory.sunday.breakfast" />
          </td>

        </tr>
        <tr>
          <td class="bg-secondary align-middle">Lunch</td>
          
          <!-- Monday lunch -->
          <td>
            <meal-plan-item :plan="this.planMemory.monday.lunch" />
          </td>

          <!-- Tuesday lunch -->
          <td>
            <meal-plan-item :plan="this.planMemory.tuesday.lunch" />
          </td>

          <!-- Wednesday lunch -->
          <td>
            <meal-plan-item :plan="this.planMemory.wednesday.lunch" />
          </td>

          <!-- Thursday lunch -->
          <td>
            <meal-plan-item :plan="this.planMemory.thursday.lunch" />
          </td>

          <!-- Friday lunch -->
          <td>
            <meal-plan-item :plan="this.planMemory.friday.lunch" />
          </td>

          <!-- Saturday lunch -->
          <td>
            <meal-plan-item :plan="this.planMemory.saturday.lunch" />
          </td>

          <!-- Sunday lunch -->
          <td>
            <meal-plan-item :plan="this.planMemory.sunday.lunch" />
          </td>

        </tr>
        <tr>
          <td class="bg-secondary align-middle">Dinner</td>

          <!-- Monday dinner -->
          <td>
            <meal-plan-item :plan="this.planMemory.monday.dinner" />
          </td>

          <!-- Tuesday dinner -->
          <td>
            <meal-plan-item :plan="this.planMemory.tuesday.dinner" />
          </td>

          <!-- Wednesday dinner -->
          <td>
            <meal-plan-item :plan="this.planMemory.wednesday.dinner" />
          </td>

          <!-- Thursday dinner -->
          <td>
            <meal-plan-item :plan="this.planMemory.thursday.dinner" />
          </td>

          <!-- Friday dinner -->
          <td>
            <meal-plan-item :plan="this.planMemory.friday.dinner" />
          </td>

          <!-- Saturday dinner -->
          <td>
            <meal-plan-item :plan="this.planMemory.saturday.dinner" />
          </td>

          <!-- Sunday dinner -->
          <td>
            <meal-plan-item :plan="this.planMemory.sunday.dinner" />
          </td>

        </tr>
      </tbody>
    </table>

    <notifications group="all" />
  </div>
</template>

<script>
import MealPlanItem from './MealPlanItem.vue';
export default {
  components: { MealPlanItem },
    props: ['plan'],
    data() {
        return {
            planMemory: false
        }
    },
    mounted() {
        this.planMemory = JSON.parse(this.plan);
    }
}
</script>

<style>

</style>