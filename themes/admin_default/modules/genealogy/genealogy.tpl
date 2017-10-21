<!-- BEGIN: main -->
	<form class="form-horizontal" action="{NV_BASE_ADMINURL}index.php?{NV_NAME_VARIABLE}={MODULE_NAME}&{NV_OP_VARIABLE}={OP}" method="post">
		<div class="panel panel-default">
			<div class="panel-heading">{LANG.genealogy}</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-xs-24 col-sm-24">
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
					<div class="col-xs-24 col-sm-24">
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
					<div class="col-xs-24 col-sm-24">
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
				<div class="row">
					<div class="col-xs-24 col-sm-24">
						<div class="form-group">
							<label class="col-xs-6 control-label"><strong>{LANG.genealogy_description}:</strong></label>
							<div class="col-xs-18">
								({LANG.genealogy_description_note})
								<br>
								{DATA.description}
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-24 col-sm-24">
						<div class="form-group">
							<label class="col-xs-6 control-label"><strong>{LANG.genealogy_rule}:</strong></label>
							<div class="col-xs-18">
								({LANG.genealogy_rule_note})
								<br>
								{DATA.rule}
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-24 col-sm-24">
						<div class="form-group">
							<label class="col-xs-6 control-label"><strong>{LANG.genealogy_content}:</strong></label>
							<div class="col-xs-18">
								({LANG.genealogy_content_note})
								<br>
								{DATA.content}
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-24 col-sm-24">
						<div class="form-group">
							<label class="col-xs-6 control-label"><strong>{LANG.status}:</strong></label>
							<div class="col-xs-18">
								<input name="status" type="checkbox" >
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-24 col-sm-24">
						<div class="form-group">
							<label class="col-xs-6 control-label"><strong>{LANG.genealogy_who_view}</strong> <span class="red">(*)</span></label>
							<div class="col-xs-18">
								<!-- BEGIN: allowed_view -->
								<div class="row">
									<label><input name="allowed_view[]" type="checkbox" value="{ALLOWED_VIEW.value}" {ALLOWED_VIEW.checked} />{ALLOWED_VIEW.title}</label>
								</div>
								<!-- END: allowed_view -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">{LANG.genealogy_info_create} ({LANG.genealogy_note})</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-xs-24 col-sm-24">
						<div class="form-group">
							<label class="col-xs-6 control-label"><strong>{LANG.genealogy_year} </strong> </label>
							<div class="col-xs-18">
								<input name="years" value="" maxlength="55" style="width: 200px;" type="text">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-24 col-sm-24">
						<div class="form-group">
							<label class="col-xs-6 control-label"><strong>{LANG.genealogy_author} </strong> </label>
							<div class="col-xs-18">
								<input name="author" value="{DATA.author}" maxlength="250" style="width: 450px;" type="text">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-24 col-sm-24">
						<div class="form-group">
							<label class="col-xs-6 control-label"><strong>{LANG.genealogy_contact} </strong> </label>
							<div class="col-xs-18">
								<input name="full_name" value="{DATA.full_name}" maxlength="250" style="width: 450px;" type="text">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-24 col-sm-24">
						<div class="form-group">
							<label class="col-xs-6 control-label"><strong>{LANG.genealogy_telephone} </strong> </label>
							<div class="col-xs-18">
								<input name="telephone" value="" maxlength="250" style="width: 200px;" type="text">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-24 col-sm-24">
						<div class="form-group">
							<label class="col-xs-6 control-label"><strong>{LANG.genealogy_email} </strong> </label>
							<div class="col-xs-18">
								<input name="email" value="" maxlength="250" style="width: 450px;" type="text">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-24 col-sm-24">
						<div class="form-group">
							<div class="col-xs-24">
								<div style="text-align: center">
									<input name="gid" type="hidden" value="{DATA.gid}" />
									<input name="submit" type="submit" value="{LANG.save}" style="width: 200px;" />
									
								</div>
							
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