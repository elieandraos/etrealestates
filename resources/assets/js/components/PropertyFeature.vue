<template>
	<div v-if="hasValue" class="property-feature">
		<table>
			<tr>
				<td class="icon"><i :class="fontawesomeIcon"></i></td>
				<td class="desc">
					<span class="text" v-html="text"></span>
					<span class="value">{{ value }}</span>
				</td>
			</tr>
		</table>
	</div>
</template>

<script>
    export default {
        props: {
            text: {
                required: true,
            },
            faIcon: {
                required: true,
            },
            value: {
                required: true,
            }
        },
        computed: {
			hasValue: function () {
		    	if(this.value) 
		    		return true;
		    	return false;
		    },
		    fontawesomeIcon: function () {
		    	return 'fa ' + this.faIcon
		    }
		}
    }
</script>

<style scoped>
	.property-feature{
		width: 100%;
		margin-bottom: 15px;
		margin-top: 15px;
	}
	.property-feature table{
		border-bottom: 1px solid #e8e8e8e8;
	}
	.property-feature:last-child table{
		border-bottom: none;
	}
	td.icon{
		width: 75px;
		text-align: center;
	}
	td.icon i{
		font-size: 34px;
		color: #999;
	}
	td.desc{
		width: 150px;
		text-align: center;
	}
	.desc .text{
		color: #676767;
	    font-weight: 400;
	    font-size: 14px;
	    display: block;
	}
	.desc .value{
		color: #000;
	    font-weight: 400;
	    font-size: 28px;
	    display: block;
	    margin-top: -8px;
	}
</style>
