@php $level = $level ?? null; @endphp

<div class="form-group">
  <label for="course_id" class="col-form-label">Course <span class="text-danger">*</span></label>
  <select name="course_id" id="course_id" class="form-control">
    <option value="">-- Select course --</option>
    @foreach($courses as $course)
      <option value="{{$course->id}}" {{ old('course_id', $level->course_id ?? '') == $course->id ? 'selected' : '' }}>{{$course->title}}</option>
    @endforeach
  </select>
  @error('course_id')
  <span class="text-danger">{{$message}}</span>
  @enderror
</div>

<div class="form-row">
  <div class="form-group col-md-6">
    <label for="skill_level" class="col-form-label">Skill Level <span class="text-danger">*</span></label>
    <select name="skill_level" id="skill_level" class="form-control">
      @foreach(\App\Models\ProductLevel::SKILL_LEVELS as $skill)
        <option value="{{$skill}}" {{ old('skill_level', $level->skill_level ?? '') == $skill ? 'selected' : '' }}>{{$skill}}</option>
      @endforeach
    </select>
    @error('skill_level')
    <span class="text-danger">{{$message}}</span>
    @enderror
  </div>
  <div class="form-group col-md-6">
    <label for="skill_level_jp" class="col-form-label">Skill Level (JP)</label>
    <input id="skill_level_jp" type="text" name="skill_level_jp" placeholder="例: ビギナー" value="{{old('skill_level_jp', $level->skill_level_jp ?? '')}}" class="form-control">
    @error('skill_level_jp')
    <span class="text-danger">{{$message}}</span>
    @enderror
  </div>
</div>

<div class="form-row">
  <div class="form-group col-md-6">
    <label for="purpose" class="col-form-label">Purpose</label>
    <textarea id="purpose" name="purpose" rows="3" class="form-control" placeholder="Purpose of this level">{{old('purpose', $level->purpose ?? '')}}</textarea>
    @error('purpose')
    <span class="text-danger">{{$message}}</span>
    @enderror
  </div>
  <div class="form-group col-md-6">
    <label for="purpose_jp" class="col-form-label">Purpose (JP)</label>
    <textarea id="purpose_jp" name="purpose_jp" rows="3" class="form-control">{{old('purpose_jp', $level->purpose_jp ?? '')}}</textarea>
    @error('purpose_jp')
    <span class="text-danger">{{$message}}</span>
    @enderror
  </div>
</div>

<div class="form-row">
  <div class="form-group col-md-6">
    <label for="learn_info" class="col-form-label">What You Will Learn</label>
    <textarea id="learn_info" name="learn_info" rows="5" class="form-control" placeholder="What the learner covers at this level">{{old('learn_info', $level->learn_info ?? '')}}</textarea>
    @error('learn_info')
    <span class="text-danger">{{$message}}</span>
    @enderror
  </div>
  <div class="form-group col-md-6">
    <label for="learn_info_jp" class="col-form-label">What You Will Learn (JP)</label>
    <textarea id="learn_info_jp" name="learn_info_jp" rows="5" class="form-control">{{old('learn_info_jp', $level->learn_info_jp ?? '')}}</textarea>
    @error('learn_info_jp')
    <span class="text-danger">{{$message}}</span>
    @enderror
  </div>
</div>

<div class="form-row">
  <div class="form-group col-md-6">
    <label for="outcome" class="col-form-label">Outcome</label>
    <textarea id="outcome" name="outcome" rows="3" class="form-control" placeholder="What the learner walks away with">{{old('outcome', $level->outcome ?? '')}}</textarea>
    @error('outcome')
    <span class="text-danger">{{$message}}</span>
    @enderror
  </div>
  <div class="form-group col-md-6">
    <label for="outcome_jp" class="col-form-label">Outcome (JP)</label>
    <textarea id="outcome_jp" name="outcome_jp" rows="3" class="form-control">{{old('outcome_jp', $level->outcome_jp ?? '')}}</textarea>
    @error('outcome_jp')
    <span class="text-danger">{{$message}}</span>
    @enderror
  </div>
</div>

<div class="form-row">
  <div class="form-group col-md-4">
    <label for="price" class="col-form-label">Price (USD)</label>
    <input id="price" type="number" step="0.01" min="0" name="price" placeholder="0.00" value="{{old('price', $level->price ?? '')}}" class="form-control">
    @error('price')
    <span class="text-danger">{{$message}}</span>
    @enderror
  </div>
  <div class="form-group col-md-4">
    <label for="price_jp" class="col-form-label">Price (JPY)</label>
    <input id="price_jp" type="number" step="0.01" min="0" name="price_jp" placeholder="0" value="{{old('price_jp', $level->price_jp ?? '')}}" class="form-control">
    @error('price_jp')
    <span class="text-danger">{{$message}}</span>
    @enderror
  </div>
  <div class="form-group col-md-4">
    <label for="price_hk" class="col-form-label">Price (HKD)</label>
    <input id="price_hk" type="number" step="0.01" min="0" name="price_hk" placeholder="0.00" value="{{old('price_hk', $level->price_hk ?? '')}}" class="form-control">
    @error('price_hk')
    <span class="text-danger">{{$message}}</span>
    @enderror
  </div>
</div>
