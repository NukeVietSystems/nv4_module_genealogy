<!-- BEGIN: main -->
	<form class="form-horizontal" action="{NV_BASE_ADMINURL}index.php?{NV_NAME_VARIABLE}={MODULE_NAME}&{NV_OP_VARIABLE}={OP}" method="post">
		<div class="panel panel-default">
			<div class="panel-heading">{LANG.genealogy}</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-xs-24 col-sm-12">
						<div class="form-group">
							<label class="col-xs-6 control-label"><strong>{LANG.genealogy_cat}</strong> <span class="red">(*)</span></label>
							<div class="col-xs-18">
								<select name="fid">
									<option selected="selected" value="0">-- {LANG.genealogy_cat_choose} --</option>
									<!-- BEGIN: family -->
										<option value="{FAMILY.fid}"{FAMILY.selected}>{FAMILY.title}</option>
									<!-- END: family -->
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-24 col-sm-12">
						<div class="form-group">
							<label class="col-xs-6 control-label"><strong>{LANG.genealogy_title}</strong> <span class="red">(*)</span></label>
							<div class="col-xs-18">
								<input class="form-control" type="text" name="title" value="" required="required"  />
								<br>
								{LANG.genealogy_title_note}
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-24 col-sm-12">
						<div class="form-group">
							<label class="col-xs-6 control-label"><strong>{LANG.genealogy_location}</strong> <span class="red">(*)</span></label>
							<div class="col-xs-18">
								<select name="locationid">
									<option value="0">-- {LANG.genealogy_location_choose} --</option>
									<!-- BEGIN: location -->
									<option value="{LOCATION.locationid}" {LOCATION.selected}>{LOCATION.title}</option>
									<!-- END: location -->
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
<!-- END: main -->
<!-- BEGIN: sub -->
	Code của sub
<!-- END: sub -->