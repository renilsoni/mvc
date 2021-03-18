<?php $attributeOptions = $this->getTableRow()->getOptions()->getData() ?>

<div class="container">
    <table class="table table-bordered" id="dynamicTable">  
        <tr>
            <th>Option Name</th>
            <th>Sort Order</th>
            <th>Action</th>
        </tr>
        <tbody>
        	<?php foreach ($attributeOptions as $attributeOption): ?>
        		<tr>  
		            <td><input type="text"  name="exist[<?= $attributeOption->optionId ?>][name]" placeholder="Enter Option Name" class="form-control" value="<?= $attributeOption->name ?>" /></td>  
		            <td><input type="number" name="exist[<?= $attributeOption->optionId ?>][sortOrder]" placeholder="Enter Sort Order" class="form-control" value="<?= $attributeOption->sortOrder ?>" /></td>  
		            <td><button type="button" class="btn btn-danger remove-tr remove" url="<?= $this->getUrl()->getUrl('delete','admin_attribute_option',['optionId' => $attributeOption->optionId]) ?>">Remove</button></td>
		        </tr> 
        	<?php endforeach ?>
        </tbody>
    </table> 
    <button type="button" name="" id="add" class="btn btn-success">Add More</button>  
    <button type="button" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('save','admin_attribute_option') ?>').resetParams().setParams($('#editForm').serializeArray()).setMethod('POST').load()" class="btn btn-success">Save</button>

</div>

<script>
    $("#add").click(function(){
        $("#dynamicTable").append('<tr><td><input type="text" name="new[name][]" placeholder="Enter Option Name" class="form-control" /></td><td><input type="text" name="new[sortOrder][]" placeholder="Enter Sort Order" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
    });
    $(document).on('click', '.remove-tr', function(){  
         $(this).closest('tr').remove();
    });  

    $(document).on('click', '.remove', function(){  
         let url = $(this).attr('url');
         object.setUrl(url).resetParams().load();
    });  
</script>

 