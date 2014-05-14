<?php /*

use Mockery as m;
//use Way\Tests\Factory;

class SlideshowsTest extends TestCase {

	public function __construct()
	{

		$this->collection = m::mock('Illuminate\Database\Eloquent\Collection')->shouldDeferMissing();
	}

	public function setUp()
	{
		parent::setUp();
        $this->mock = m::mock('Eloquent', 'Role');
		//$this->attributes = Factory::slideshow(['id' => 1]);
		$this->app->instance('Slideshow', $this->mock);
	}

	public function tearDown()
	{
		m::close();
	}

	public function testIndex()
	{
		$this->mock->shouldReceive('all')->once()->andReturn($this->collection);
		$this->call('GET', 'slideshows');

		$this->assertViewHas('slideshows');
	}

	public function testCreate()
	{
		$this->call('GET', 'slideshows/create');

		$this->assertResponseOk();
	}

	public function testStore()
	{
		$this->mock->shouldReceive('create')->once();
		$this->validate(true);
		$this->call('POST', 'slideshows');

		$this->assertRedirectedToRoute('slideshows.index');
	}

	public function testStoreFails()
	{
		$this->mock->shouldReceive('create')->once();
		$this->validate(false);
		$this->call('POST', 'slideshows');

		$this->assertRedirectedToRoute('slideshows.create');
		$this->assertSessionHasErrors();
		$this->assertSessionHas('message');
	}

	public function testShow()
	{
		$this->mock->shouldReceive('findOrFail')
				   ->with(1)
				   ->once()
				   ->andReturn($this->attributes);

		$this->call('GET', 'slideshows/1');

		$this->assertViewHas('slideshow');
	}

	public function testEdit()
	{
		$this->collection->id = 1;
		$this->mock->shouldReceive('find')
				   ->with(1)
				   ->once()
				   ->andReturn($this->collection);

		$this->call('GET', 'slideshows/1/edit');

		$this->assertViewHas('slideshow');
	}

	public function testUpdate()
	{
		$this->mock->shouldReceive('find')
				   ->with(1)
				   ->andReturn(m::mock(['update' => true]));

		$this->validate(true);
		$this->call('PATCH', 'slideshows/1');

		$this->assertRedirectedTo('slideshows/1');
	}

	public function testUpdateFails()
	{
		$this->mock->shouldReceive('find')->with(1)->andReturn(m::mock(['update' => true]));
		$this->validate(false);
		$this->call('PATCH', 'slideshows/1');

		$this->assertRedirectedTo('slideshows/1/edit');
		$this->assertSessionHasErrors();
		$this->assertSessionHas('message');
	}

	public function testDestroy()
	{
		$this->mock->shouldReceive('find')->with(1)->andReturn(m::mock(['delete' => true]));

		$this->call('DELETE', 'slideshows/1');
	}

	protected function validate($bool)
	{
		Validator::shouldReceive('make')
				->once()
				->andReturn(m::mock(['passes' => $bool]));
	}
}
