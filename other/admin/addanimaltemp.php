<div class="row">
								<!-- Tabs -->
									<ul class="nav nav-lg nav-tabs nav-justified no-margin no-border-radius tab-pane fade in">
										<li class="active">
											<a href="#messages-amp" class="text-size-small text-uppercase" data-toggle="tab">
												Amphibian
											</a>
										</li>

										<li>
											<a href="#messages-bird" class="text-size-small text-uppercase" data-toggle="tab">
												Bird
											</a>
										</li>
										<li>
											<a href="#messages-fish" class="text-size-small text-uppercase" data-toggle="tab">
												Fish
											</a>
										</li>
										<li>
											<a href="#messages-rep" class="text-size-small text-uppercase" data-toggle="tab">
												Reptile
											</a>
										</li>

										<li>
											<a href="#messages-mam" class="text-size-small text-uppercase" data-toggle="tab">
												Mammal
											</a>
										</li>
									</ul>
								<!-- /tabs -->

								<!-- Tabs content -->
								<div class="tab-content">

									<div class="tab-pane active fade in has-padding switch-tables" id="messages-amp">
											<form id="form_amp" class="form-horizontal" action="#">
												<fieldset class="content-group">
													<legend class="text-bold">Enter a new Amphibian</legend>

													<div class="form-group">
														<label class="control-label col-md-2">Given name</label>
														<div class="col-md-10">
															<input type="text" id="amp_givenname" class="form-control text-light" placeholder="Enter the given name" required>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-md-2">Species name</label>
														<div class="col-md-10">
															<input type="text" id="amp_species_name" class="form-control text-light" placeholder="Enter the species name" required>
														</div>
													</div>


													<div class="form-group">
														<label class="control-label col-md-2">Join Date</label>
														<div class="col-md-10">
															<input id="amp_join_date" class="form-control" type="date" name="date" required>
														</div>
													</div>


													<div class="form-group">
														<label class="control-label col-lg-2">Gender</label>
														<div class="col-lg-10">
															<select name="select" id="amp_gender" class="form-control" required>
																<option value="M">Male</option>
																<option value="F">Female</option>
																
															</select>
														</div>
													</div>


													<div class="form-group">
														<label class="control-label col-md-2">Average Lifespan</label>
														<div class="col-md-10">
															<input type="text" id="amp_lifespan" class="form-control text-light" placeholder="Enter the average name" required>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-md-2">Dietary Requirement</label>
														<div class="col-md-10">
															<input type="text" id="amp_diet" class="form-control text-light" placeholder="Enter the dietary requirement" required>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-md-2">Natural habitat</label>
														<div class="col-md-10">
															<input type="text" id="amp_habitat" class="form-control text-light" placeholder="Enter the natural habitat" required>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-md-2">Population distribution</label>
														<div class="col-md-10">
															<input type="text" id="amp_population_dist" class="form-control text-light" placeholder="Enter the population distribution" required>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-md-2">Height</label>
														<div class="col-md-10">
															<input type="number" id="amp_height" class="form-control text-light" placeholder="Enter the height" required>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-md-2">Weight</label>
														<div class="col-md-10">
															<input type="number"  id="amp_weight" class="form-control text-light" placeholder="Enter the weight" required>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-lg-2">Description</label>
														<div class="col-lg-10">
															<textarea rows="5" cols="5" id="amp_description" class="form-control" placeholder="Enter the description"></textarea>
														</div>
													</div>


													<!-- ----------------------- -->

													<div class="form-group">
														<label class="control-label col-md-2">Reproduction type</label>
														<div class="col-md-10">
															<input type="text" id="amp_rep_type" class="form-control text-light" placeholder="Enter the reproduction type" required>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-md-2">Clutch Size</label>
														<div class="col-md-10">
															<input type="text" id="amp_clutch_size" class="form-control text-light" placeholder="Enter the clutch size" required>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-md-2">No of offspring</label>
														<div class="col-md-10">
															<input type="text" id="amp_offspring" class="form-control text-light" placeholder="Enter the number of offspring" required>
														</div>
													</div>

													<div class="form-group">
														<label>Images:</label>
														<input name="recommendations" type="file" class="file-styled">
		                                            </div>

										
												</fieldset>

												<div class="text-right">
													<button type="submit" id="amp_submit"  class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
												</div>
											</form>
									</div>

									<div class="tab-pane fade has-padding switch-tables" id="messages-mam">
											<form id="form_mam" class="form-horizontal" action="#">
												<fieldset class="content-group">
													<legend class="text-bold">Enter a new mammal</legend>

													<div class="form-group">
														<label class="control-label col-md-2">Given name</label>
														<div class="col-md-10">
															<input type="text" id="mam_givenname" class="form-control text-light" placeholder="Enter the given name" required>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-md-2">Species name</label>
														<div class="col-md-10">
															<input type="text" id="mam_species_name" class="form-control text-light" placeholder="Enter the species name" required>
														</div>
													</div>


													<div class="form-group">
														<label class="control-label col-md-2">Join Date</label>
														<div class="col-md-10">
															<input id="mam_join_date" class="form-control" type="date" name="date" required>
														</div>
													</div>


													<div class="form-group">
														<label class="control-label col-lg-2">Gender</label>
														<div class="col-lg-10">
															<select name="select" id="mam_gender" class="form-control" required>
																<option value="M">Male</option>
																<option value="F">Female</option>
																
															</select>
														</div>
													</div>


													<div class="form-group">
														<label class="control-label col-md-2">Average Lifespan</label>
														<div class="col-md-10">
															<input type="text" id="mam_lifespan" class="form-control text-light" placeholder="Enter the average name" required>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-md-2">Dietary Requirement</label>
														<div class="col-md-10">
															<input type="text" id="mam_diet" class="form-control text-light" placeholder="Enter the dietary requirement" required>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-md-2">Natural habitat</label>
														<div class="col-md-10">
															<input type="text" id="mam_habitat" class="form-control text-light" placeholder="Enter the natural habitat" required>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-md-2">Population distribution</label>
														<div class="col-md-10">
															<input type="text" id="mam_population_dist" class="form-control text-light" placeholder="Enter the population distribution" required>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-md-2">Height</label>
														<div class="col-md-10">
															<input type="number" id="mam_height" class="form-control text-light" placeholder="Enter the height" required>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-md-2">Weight</label>
														<div class="col-md-10">
															<input type="number" id="mam_weight" class="form-control text-light" placeholder="Enter the weight" required>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-lg-2">Description</label>
														<div class="col-lg-10">
															<textarea rows="5" cols="5" id="mam_description" class="form-control" placeholder="Enter the description"></textarea>
														</div>
													</div>


													<!-- ----------------------- -->
													<div class="form-group">
														<label>Images:</label>
														<input name="recommendations" type="file" class="file-styled">
		                                			</div>


										
												</fieldset>

												<div class="text-right">
													<button type="submit" id="mam_submit"  class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
												</div>
											</form>	
									</div>			

									<div class="tab-pane fade has-padding switch-tables" id="messages-rep">
											<form id="form_rep" class="form-horizontal" action="#">
												<fieldset class="content-group">
													<legend class="text-bold">Enter a new reptile</legend>

													<div class="form-group">
														<label class="control-label col-md-2">Given name</label>
														<div class="col-md-10">
															<input type="text" id="rep_givenname" class="form-control text-light" placeholder="Enter the given name" required>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-md-2">Species name</label>
														<div class="col-md-10">
															<input type="text" id="rep_species_name" class="form-control text-light" placeholder="Enter the species name" required>
														</div>
													</div>


													<div class="form-group">
														<label class="control-label col-md-2">Join Date</label>
														<div class="col-md-10">
															<input id="rep_join_date" class="form-control" type="date" name="date" required>
														</div>
													</div>


													<div class="form-group">
														<label class="control-label col-lg-2">Gender</label>
														<div class="col-lg-10">
															<select name="select" id="rep_gender" class="form-control" required>
																<option value="M">Male</option>
																<option value="F">Female</option>
																
															</select>
														</div>
													</div>


													<div class="form-group">
														<label class="control-label col-md-2">Average Lifespan</label>
														<div class="col-md-10">
															<input type="text" id="rep_lifespan" class="form-control text-light" placeholder="Enter the average name" required>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-md-2">Dietary Requirement</label>
														<div class="col-md-10">
															<input type="text" id="rep_diet" class="form-control text-light" placeholder="Enter the dietary requirement" required>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-md-2">Natural habitat</label>
														<div class="col-md-10">
															<input type="text" id="rep_habitat" class="form-control text-light" placeholder="Enter the natural habitat" required>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-md-2">Population distribution</label>
														<div class="col-md-10">
															<input type="text" id="rep_population_dist" class="form-control text-light" placeholder="Enter the population distribution" required>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-md-2">Height</label>
														<div class="col-md-10">
															<input type="number" id="rep_height" class="form-control text-light" placeholder="Enter the height" required>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-md-2">Weight</label>
														<div class="col-md-10">
															<input type="number" id="rep_weight" class="form-control text-light" placeholder="Enter the weight" required>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-lg-2">Description</label>
														<div class="col-lg-10">
															<textarea rows="5" cols="5" id="rep_description" class="form-control" placeholder="Enter the description"></textarea>
														</div>
													</div>


													<!-- ----------------------- -->

													<div class="form-group">
														<label>Images:</label>
														<input name="recommendations" type="file" class="file-styled">
		                                            </div>


										
												</fieldset>

												<div class="text-right">
													<button type="submit" id="rep_submit"  class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
												</div>
											</form>	
									</div>

									<div class="tab-pane fade has-padding switch-tables" id="messages-fish">
											<form id="form_fish" class="form-horizontal" action="#">
												<fieldset class="content-group">
													<legend class="text-bold">Enter a new fish</legend>

													<div class="form-group">
														<label class="control-label col-md-2">Given name</label>
														<div class="col-md-10">
															<input type="text" id="fish_givenname" class="form-control text-light" placeholder="Enter the given name" required>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-md-2">Species name</label>
														<div class="col-md-10">
															<input type="text" id="fish_species_name" class="form-control text-light" placeholder="Enter the species name" required>
														</div>
													</div>


													<div class="form-group">
														<label class="control-label col-md-2">Join Date</label>
														<div class="col-md-10">
															<input id="fish_join_date" class="form-control" type="date" name="date" required>
														</div>
													</div>


													<div class="form-group">
														<label class="control-label col-lg-2">Gender</label>
														<div class="col-lg-10">
															<select name="select" id="fish_gender" class="form-control" required>
																<option value="M">Male</option>
																<option value="F">Female</option>
																
															</select>
														</div>
													</div>


													<div class="form-group">
														<label class="control-label col-md-2">Average Lifespan</label>
														<div class="col-md-10">
															<input type="text" id="fish_lifespan" class="form-control text-light" placeholder="Enter the average name" required>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-md-2">Dietary Requirement</label>
														<div class="col-md-10">
															<input type="text" id="fish_diet" class="form-control text-light" placeholder="Enter the dietary requirement" required>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-md-2">Natural habitat</label>
														<div class="col-md-10">
															<input type="text" id="fish_habitat" class="form-control text-light" placeholder="Enter the natural habitat" required>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-md-2">Population distribution</label>
														<div class="col-md-10">
															<input type="text" id="fish_population_dist" class="form-control text-light" placeholder="Enter the population distribution" required>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-md-2">Height</label>
														<div class="col-md-10">
															<input type="number" id="fish_height" class="form-control text-light" placeholder="Enter the height" required>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-md-2">Weight</label>
														<div class="col-md-10">
															<input type="number" id="fish_weight" class="form-control text-light" placeholder="Enter the weight" required>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-lg-2">Description</label>
														<div class="col-lg-10">
															<textarea rows="5" cols="5" id="fish_description" class="form-control" placeholder="Enter the description"></textarea>
														</div>
													</div>


													<div class="form-group">
														<label>Images:</label>
														<input name="recommendations" type="file" class="file-styled">
		                                            </div>


													<!-- ----------------------- -->

										
												</fieldset>

												<div class="text-right">
													<button type="submit" id="fish_submit"  class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
												</div>
											</form>	
									</div>

									<div class="tab-pane fade has-padding switch-tables" id="messages-bird">
											<form id="form_bird" class="form-horizontal" action="#">
												<fieldset class="content-group">
													<legend class="text-bold">Enter a new bird</legend>

													<div class="form-group">
														<label class="control-label col-md-2">Given name</label>
														<div class="col-md-10">
															<input type="text" id="bird_givenname" class="form-control text-light" placeholder="Enter the given name" required>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-md-2">Species name</label>
														<div class="col-md-10">
															<input type="text" id="bird_species_name" class="form-control text-light" placeholder="Enter the species name" required>
														</div>
													</div>


													<div class="form-group">
														<label class="control-label col-md-2">Join Date</label>
														<div class="col-md-10">
															<input id="bird_join_date" class="form-control" type="date" name="date" required>
														</div>
													</div>


													<div class="form-group">
														<label class="control-label col-lg-2">Gender</label>
														<div class="col-lg-10">
															<select name="select" id="bird_gender" class="form-control" required>
																<option value="M">Male</option>
																<option value="F">Female</option>
																
															</select>
														</div>
													</div>


													<div class="form-group">
														<label class="control-label col-md-2">Average Lifespan</label>
														<div class="col-md-10">
															<input type="text" id="bird_lifespan" class="form-control text-light" placeholder="Enter the average name" required>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-md-2">Dietary Requirement</label>
														<div class="col-md-10">
															<input type="text" id="bird_diet" class="form-control text-light" placeholder="Enter the dietary requirement" required>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-md-2">Natural habitat</label>
														<div class="col-md-10">
															<input type="text" id="bird_habitat" class="form-control text-light" placeholder="Enter the natural habitat" required>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-md-2">Population distribution</label>
														<div class="col-md-10">
															<input type="text" id="bird_population_dist" class="form-control text-light" placeholder="Enter the population distribution" required>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-md-2">Height</label>
														<div class="col-md-10">
															<input type="number" id="bird_height" class="form-control text-light" placeholder="Enter the height" required>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-md-2">Weight</label>
														<div class="col-md-10">
															<input type="number" id="bird_weight" class="form-control text-light" placeholder="Enter the weight" required>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-lg-2">Description</label>
														<div class="col-lg-10">
															<textarea rows="5" cols="5" id="bird_description" class="form-control" placeholder="Enter the description"></textarea>
														</div>
													</div>

													<div class="form-group">
														<label>Images:</label>
														<input name="recommendations" type="file" class="file-styled">
		                                            </div>

												</fieldset>

												<div class="text-right">
													<button type="submit" id="bird_submit"  class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
												</div>
											</form>	
									</div>


								</div>
								<!-- /tabs content -->
					</div>